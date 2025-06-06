use App\Models\Stage;

public function create()
{
    $stages = Stage::where('status', 1)->orderBy('name')->get();
    return view('articles.create', compact('stages'));
}

public function edit(Article $article)
{
    $stages = Stage::where('status', 1)->orderBy('name')->get();
    return view('articles.edit', compact('article', 'stages'));
}
