<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;

    public function __construct(Category $model)
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
