<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

class AuthorRepository implements AuthorRepositoryInterface
{
    protected $model;

    public function __construct(Author $model)
    {
        $this->model = $model;
    }

    public function all($request): Collection
    {
        return $this->model->when(request('limit'),function ($query) use ($request){
                $query->limit($request->limit);
            })
//            ->when(request('offset'),function ($query) use ($request){
//                $query->offset($request->offset);
//            })
            ->get();
    }


}
