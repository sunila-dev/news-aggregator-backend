<?php

namespace App\Services\ArticleFetcher;

use Illuminate\Support\Facades\Http;

class NewsApiFetcher implements ArticleFetcherInterface
{
    public function fetch(): array
    {
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'country' => 'us',
            'apiKey' => env('NEWS_API_KEY'),
        ]);

        if ($response->failed()) {
            return [];
        }

        return collect($response->json()['articles'] ?? [])->map(function ($article) {
            return [
                'title'        => $article['title'],
                'description'  => $article['description'],
                'url'          => $article['url'],
                'published_at' => $article['publishedAt'],
                'source_name'  => $article['source']['name'],
                'category'     => 'general',
            ];
        })->toArray();
    }
}
