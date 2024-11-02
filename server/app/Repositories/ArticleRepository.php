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

    public function all($request): Collection
    {
        return $this->model->with(['media','source','category','author'])
            ->when(request('category'), function ($query) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', '=', request('category'));
            });
        })
            ->when(request('author'), function ($query) {
                $query->whereHas('author', function ($q) {
                    $q->where('slug', '=', request('author'));
                });
            })
            ->when(request('source'), function ($query) {
                $query->whereHas('source', function ($q) {
                    $q->where('slug', '=', request('source'));
                });
            })
            ->when(request('search'), function ($query) use ($request){
                $query->where('slug', 'like', '%'.request('search').'%');
            })
            ->when(request('limit'),function ($query) use ($request){
                $query->limit($request->limit);
            })
//            ->when(request('offset'),function ($query) use ($request){
//                $query->offset($request->offset);
//            })
            ->get();
    }

    public function find(int $id): ?Article
    {
        return $this->model->with(['source', 'category', 'author'])->find($id);
    }

}
