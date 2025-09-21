<?php

namespace App\Services\ArticleFetcher;

interface ArticleFetcherInterface
{
    /**
     * Fetch articles from the source.
     *
     * @return array
     */
    public function fetch(): array;
}
