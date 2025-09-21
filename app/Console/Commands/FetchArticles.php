<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ArticleFetcher\NewsApiFetcher;
use App\Repositories\ArticleRepository;
use App\Services\ArticleFetcher\NewsCredFetcher;
use App\Services\ArticleFetcher\OpenNewsFetcher;

class FetchArticles extends Command
{
    protected $signature = 'api:fetch-articles';
    protected $description = 'Command to fetch the articles';

    public function __construct(
        protected ArticleRepository $articleRepository,
        protected NewsApiFetcher $newsApiFetcher,
        protected OpenNewsFetcher $openNewsFetcher,
        protected NewsCredFetcher $newsCredFetcher
        ) {
        parent::__construct();

        $this->articleRepository = $articleRepository;
        $this->newsApiFetcher = $newsApiFetcher;
        $this->openNewsFetcher = $openNewsFetcher;
        $this->newsCredFetcher = $newsCredFetcher;
    }

    public function handle()
    {
        $fetchers = [
            $this->newsApiFetcher,
            $this->openNewsFetcher,
            $this->newsCredFetcher,
        ];

        foreach ($fetchers as $fetcher) {
            $this->info('Fetching articles from ' . get_class($fetcher) . '...');

            $articles = $fetcher->fetch();

            $this->articleRepository->saveArticles($articles);

            $this->info(count($articles) . ' articles fetched and saved.');
        }
    }
}
