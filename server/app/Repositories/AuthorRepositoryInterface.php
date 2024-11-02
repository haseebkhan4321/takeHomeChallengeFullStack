<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface AuthorRepositoryInterface
{
    public function all($request): Collection;
}
