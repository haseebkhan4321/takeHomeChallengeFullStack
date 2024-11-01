<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use Illuminate\Http\UploadedFile;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getAllArticles($request)
    {
        return $this->articleRepository->all($request);
    }

    public function getArticleById($id)
    {
        return $this->articleRepository->findById($id);
    }


}
