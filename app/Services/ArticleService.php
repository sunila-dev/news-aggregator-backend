<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleService
{
    public function getArticles(Request $request)
    {
        $query = Article::with('source');

        if ($request->filled('source_id')) {
            $query->where('source_id', $request->source_id);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('published_at', $request->date);
        }

        return $query->latest()->paginate(10);
    }

    public function getArticleById(int $id): Article
    {
        return Article::with('source')->findOrFail($id);
    }
}
