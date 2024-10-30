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
        return $this->model->all();
    }

    public function find(int $id): ?Article
    {
        return $this->model->find($id);
    }

    public function create(array $data): Article
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $article = $this->model->find($id);
        if ($article) {
            return $article->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $article = $this->model->find($id);
        if ($article) {
            return $article->delete();
        }
        return false;
    }
}
