<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function all($request): Collection;

    public function find(int $id): ?Article;

}
