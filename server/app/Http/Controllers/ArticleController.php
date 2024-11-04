<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $articles = $this->articleService->getAllArticles($request);
        return response()->json($articles);
    }

    public function show($slug)
    {
        $article = $this->articleService->getArticleBySlug($slug);
        return response()->json($article);
    }

}
