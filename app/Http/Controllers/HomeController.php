<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->where('is_published', true)
            ->orderBy('event_date', 'desc')
            ->paginate(9);

        $categories = Category::withCount('articles')
            ->where('is_active', true)
            ->get();

        return view('home', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        if (!$article->is_published) {
            abort(404);
        }
        return view('articles.show', compact('article'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $articles = Article::with('category')
            ->where('category_id', $category->id)
            ->where('is_published', true)
            ->orderBy('event_date', 'desc')
            ->paginate(9);

        $categories = Category::withCount('articles')
            ->where('is_active', true)
            ->get();

        return view('home', compact('articles', 'categories', 'category'));
    }
}
