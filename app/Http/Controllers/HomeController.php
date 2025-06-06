<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_published', true)
            ->orderBy('event_date')
            ->get();
        return view('home', compact('articles'));
    }

    public function show(Article $article)
    {
        if (!$article->is_published) {
            abort(404);
        }
        return view('articles.show', compact('article'));
    }
}
