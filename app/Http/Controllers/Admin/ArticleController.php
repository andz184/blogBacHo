<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $articles = Article::with('category')
                ->latest()
                ->paginate(10);
            return view('admin.articles.index', compact('articles'));
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi tải danh sách bài viết.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categories = Category::where('is_active', true)->get();
            return view('admin.articles.create', compact('categories'));
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi tải form tạo bài viết.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'period' => 'nullable|string|max:255',
                'event_date' => 'nullable|date_format:Y-m-d',
                'location' => 'nullable|string|max:255',
                'is_published' => 'boolean'
            ], [
                'title.required' => 'Vui lòng nhập tiêu đề bài viết.',
                'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
                'content.required' => 'Vui lòng nhập nội dung bài viết.',
                'category_id.required' => 'Vui lòng chọn danh mục.',
                'category_id.exists' => 'Danh mục không tồn tại.',
                'image.image' => 'File phải là hình ảnh.',
                'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
                'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
                'event_date.date_format' => 'Ngày phải có định dạng YYYY-MM-DD.',
                'period.max' => 'Giai đoạn không được vượt quá 255 ký tự.',
                'location.max' => 'Địa điểm không được vượt quá 255 ký tự.'
            ]);

            // Format event_date if provided
            if (!empty($validated['event_date'])) {
                $validated['event_date'] = date('Y-m-d', strtotime($validated['event_date']));
            }

            // Generate slug from title
            // $validated['slug'] = Str::slug($validated['title']);

            // Check for duplicate slug
            // $count = 1;
            // $originalSlug = $validated['slug'];
            // while (Article::where('slug', $validated['slug'])->exists()) {
            //     $validated['slug'] = $originalSlug . '-' . $count;
            //     $count++;
            // }

            if($request->hasFile('image')){
                $path = $request->file('image')->store('articles', 'public');
                $validated['image'] = $path;
            }

            Article::create($validated);

            return redirect()->route('admin.articles.index')
                ->with('success', 'Bài viết đã được tạo thành công.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi tạo bài viết. Vui lòng thử lại.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        try {
            $categories = Category::where('is_active', true)->get();
            return view('admin.articles.edit', compact('article', 'categories'));
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi tải form chỉnh sửa bài viết.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'period' => 'nullable|string|max:255',
                'event_date' => 'nullable|date_format:Y-m-d',
                'location' => 'nullable|string|max:255',
                'is_published' => 'boolean'
            ], [
                'title.required' => 'Vui lòng nhập tiêu đề bài viết.',
                'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
                'content.required' => 'Vui lòng nhập nội dung bài viết.',
                'category_id.required' => 'Vui lòng chọn danh mục.',
                'category_id.exists' => 'Danh mục không tồn tại.',
                'image.image' => 'File phải là hình ảnh.',
                'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
                'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
                'event_date.date_format' => 'Ngày phải có định dạng YYYY-MM-DD.',
                'period.max' => 'Giai đoạn không được vượt quá 255 ký tự.',
                'location.max' => 'Địa điểm không được vượt quá 255 ký tự.'
            ]);

            // Format event_date if provided
            if (!empty($validated['event_date'])) {
                $validated['event_date'] = date('Y-m-d', strtotime($validated['event_date']));
            }

            // // Generate slug from title
            // $validated['slug'] = Str::slug($validated['title']);

            // // Check for duplicate slug, excluding current article
            // $count = 1;
            // $originalSlug = $validated['slug'];
            // while (Article::where('slug', $validated['slug'])
            //              ->where('id', '!=', $article->id)
            //              ->exists()) {
            //     $validated['slug'] = $originalSlug . '-' . $count;
            //     $count++;
            // }

            if($request->hasFile('image')) {
                if($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
                $path = $request->file('image')->store('articles', 'public');
                $validated['image'] = $path;
            }

            $article->update($validated);

            return redirect()->route('admin.articles.index')
                ->with('success', 'Bài viết đã được cập nhật thành công.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi cập nhật bài viết. Vui lòng thử lại.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        try {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $article->delete();

            return redirect()->route('admin.articles.index')
                ->with('success', 'Bài viết đã được xóa thành công.');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi xóa bài viết. Vui lòng thử lại.');
        }
    }
}
