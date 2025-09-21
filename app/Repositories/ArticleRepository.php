<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Source;

class ArticleRepository
{
    public function saveArticles(array $articles): void
{
    foreach ($articles as $articleData) {
        $source = Source::where('name', $articleData['source_name'])->first();
        if (!$source) {
            \Log::warning("Skipped article: {$articleData['title']} — unknown source {$articleData['source_name']}");
            continue;
        }

        if (empty($articleData['title']) || empty($articleData['url']) || empty($articleData['published_at'])) {
            \Log::warning("Skipped incomplete article from {$source->name}");
            continue;
        }

        Article::updateOrCreate(
            [
                'title'     => $articleData['title'],
                'source_id' => $source->id
            ],
            [
                'description'  => $articleData['description'] ?? null,
                'url'          => $articleData['url'],
                'image_url'    => $articleData['image_url'] ?? null,
                'published_at' => $articleData['published_at'],
                'category'     => $articleData['category'] ?? null,
                'author'       => $articleData['author'] ?? null,
            ]
        );
    }
}
}
