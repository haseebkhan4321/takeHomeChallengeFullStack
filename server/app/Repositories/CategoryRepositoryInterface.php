<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function all($request): Collection;
}
