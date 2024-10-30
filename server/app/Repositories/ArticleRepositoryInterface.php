<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?Article;

    public function create(array $data): Article;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;
}
