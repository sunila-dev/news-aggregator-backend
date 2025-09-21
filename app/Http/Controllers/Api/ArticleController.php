<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(protected ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function getAllArticles(Request $request): JsonResponse
    {
        $articles = $this->articleService->getArticles($request);
        
        return response()->json($articles);
    }

    public function getArticle(int $articleId): JsonResponse
    {
        $articles = $this->articleService->getArticleById($articleId);
        
        return response()->json($articles);
    }
}
