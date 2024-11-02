<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface SourceRepositoryInterface
{
    public function all($request): Collection;
}
