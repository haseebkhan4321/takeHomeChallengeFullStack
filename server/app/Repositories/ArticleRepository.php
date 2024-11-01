<?php

namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
    protected $model;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->with(['source','category','author'])->get();
    }

    public function find(int $id): ?Article
    {
        return $this->model->with(['source', 'category', 'author'])->find($id);
    }

}
