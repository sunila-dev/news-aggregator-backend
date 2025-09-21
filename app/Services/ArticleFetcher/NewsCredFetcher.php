<?php

namespace App\Services\ArticleFetcher;

use Illuminate\Support\Facades\Http;

class NewsCredFetcher implements ArticleFetcherInterface
{
    public function fetch(): array
    {
        // $endpoint = env('NEWSCRED_ENDPOINT', 'https://api.newscred.com/v3/articles');
        // $authKey  = env('NEWSCRED_API_KEY');

        // $response = Http::withHeaders([
        //     'Authorization' => $authKey,
        // ])->get($endpoint);

        // if ($response->failed()) {
        //     return [];
        // }

        // return collect($response->json()['articles'] ?? [])->map(function ($article) {
        //     return [
        //         'source_name'  => 'NewsCred',
        //         'title'        => $article['title'] ?? null,
        //         'description'  => $article['description'] ?? null,
        //         'url'          => $article['url'] ?? null,
        //         'image_url'    => $article['image_url'] ?? null,
        //         'published_at' => $article['published_at'] ?? now(),
        //         'category'     => $article['category'] ?? null,
        //         'author'       => $article['author'] ?? null,
        //     ];
        // })->toArray();

        return [
            [
                'source_name'  => 'NewsCred',
                'title'        => 'NewsCred Tech Trends 2025',
                'description'  => 'The latest trends in tech for 2025...',
                'url'          => 'https://newscred.example.com/tech-trends-2025',
                'image_url'    => null,
                'published_at' => now(),
                'category'     => 'technology',
                'author'       => 'Alice Johnson',
            ],
            [
                'source_name'  => 'NewsCred',
                'title'        => 'Healthcare Innovations',
                'description'  => 'New healthcare technologies are emerging...',
                'url'          => 'https://newscred.example.com/healthcare-innovations',
                'image_url'    => null,
                'published_at' => now(),
                'category'     => 'health',
                'author'       => 'Bob Martin',
            ],
        ];
    }
}
