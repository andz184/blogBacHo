<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all(); // For parent category selection
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $slug = Str::slug($request->name);

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'parent_id' => [
                    'nullable',
                    'exists:categories,id',
                    function ($attribute, $value, $fail) {
                        if ($value) {
                            $parent = Category::find($value);
                            if ($parent && $parent->parent_id) {
                                $fail('Chỉ cho phép một cấp danh mục cha.');
                            }
                        }
                    },
                ]
            ]);

            // Kiểm tra slug trùng lặp
            if (Category::where('slug', $slug)->exists()) {
                return back()
                    ->withInput()
                    ->withErrors(['name' => 'Tên danh mục này đã tồn tại. Vui lòng chọn tên khác.']);
            }

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $slug;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->is_active = $request->has('is_active');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);
                $category->image = 'images/categories/' . $imageName;
            }

            $category->save();

            return redirect()->route('admin.categories.index')
                ->with('success', 'Danh mục đã được tạo thành công.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra khi tạo danh mục. Vui lòng thử lại.']);
        }
    }

    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get(); // Exclude current category
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        try {
            $slug = Str::slug($request->name);

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'parent_id' => [
                    'nullable',
                    'exists:categories,id',
                    function ($attribute, $value, $fail) use ($category) {
                        if ($value) {
                            if ($value == $category->id) {
                                $fail('Không thể chọn chính danh mục này làm danh mục cha.');
                                return;
                            }
                            $parent = Category::find($value);
                            if ($parent && $parent->parent_id) {
                                $fail('Chỉ cho phép một cấp danh mục cha.');
                            }
                        }
                    },
                ]
            ]);

            // Kiểm tra slug trùng lặp, loại trừ category hiện tại
            if (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                return back()
                    ->withInput()
                    ->withErrors(['name' => 'Tên danh mục này đã tồn tại. Vui lòng chọn tên khác.']);
            }

            $category->name = $request->name;
            $category->slug = $slug;
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->is_active = $request->has('is_active');

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($category->image && file_exists(public_path($category->image))) {
                    unlink(public_path($category->image));
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/categories'), $imageName);
                $category->image = 'images/categories/' . $imageName;
            }

            $category->save();

            return redirect()->route('admin.categories.index')
                ->with('success', 'Danh mục đã được cập nhật thành công.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật danh mục. Vui lòng thử lại.']);
        }
    }

    public function destroy(Category $category)
    {
        try {
            // Check if category has children
            if ($category->children()->count() > 0) {
                return back()->with('error', 'Không thể xóa danh mục này vì có các danh mục con.');
            }

            // Delete image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $category->delete();

            return redirect()->route('admin.categories.index')
                ->with('success', 'Danh mục đã được xóa thành công.');

        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi xóa danh mục. Vui lòng thử lại.');
        }
    }
}
