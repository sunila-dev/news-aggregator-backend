<?php

namespace App\Services\ArticleFetcher;

use Illuminate\Support\Facades\Http;

class OpenNewsFetcher implements ArticleFetcherInterface
{
    public function fetch(): array
    {
        // $endpoint = env('OPENNEWS_ENDPOINT', 'https://api.opennews.org/v1/articles');
        // $authKey  = env('OPENNEWS_API_KEY');

        // $response = Http::withHeaders([
        //     'Authorization' => $authKey,
        // ])->get($endpoint);

        // if ($response->failed()) {
        //     return [];
        // }

        // return collect($response->json()['articles'] ?? [])->map(function ($article) {
        //     return [
        //         'source_name'  => 'OpenNews',
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
                'source_name'  => 'OpenNews',
                'title'        => 'OpenNews AI Update',
                'description'  => 'AI is transforming industries...',
                'url'          => 'https://opennews.example.com/ai-update',
                'image_url'    => null,
                'published_at' => now(),
                'category'     => 'technology',
                'author'       => 'John Doe',
            ],
            [
                'source_name'  => 'OpenNews',
                'title'        => 'Global Economy Today',
                'description'  => 'Markets are reacting to...',
                'url'          => 'https://opennews.example.com/global-economy',
                'image_url'    => null,
                'published_at' => now(),
                'category'     => 'business',
                'author'       => 'Jane Smith',
            ],
        ];
    }
}
