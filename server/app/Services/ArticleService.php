<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use GuzzleHttp\Client;
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

    public function getArticleBySlug($slug)
    {
        return $this->articleRepository->findBySlug($slug);
    }


    public function fetchArticlesFromNewsApi()
    {
        $url = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . config('thirdparty_credentials.news_api_key');

        try {
            $client = new Client();
            $response = $client->get($url);
            $articles = json_decode($response->getBody(), true)['articles'];
            return $articles;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function createArticle($data){
        return $this->articleRepository->firstOrCreate($data);
    }
}
