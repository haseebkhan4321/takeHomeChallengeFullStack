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
            ->when(auth()->check(),function ($query) use ($request){
                $user = auth()->user();
                $query->whereIn('id',$user->prefrencedArticles->pluck('id'));
                $query->orWhereHas('category', function ($query) use ($user){
                    $query->whereIn('id',$user->prefrencedCategory->pluck('id'));
                });
                $query->orWhereHas('author', function ($query) use ($user){
                    $query->whereIn('id',$user->prefrencedAuthor->pluck('id'));
                });
                $query->orWhereHas('source', function ($query) use ($user){
                    $query->whereIn('id',$user->prefrencedSource->pluck('id'));
                });
            })

//            ->when(request('offset'),function ($query) use ($request){
//                $query->offset($request->offset);
//            })
            ->get();
    }

    public function prefrenceArticles($request): Collection
    {
        $user =  auth()->user();
        dd($user);
    }
    public function findBySlug(string $slug): ?Article
    {
        return $this->model->with(['source', 'category', 'author','media'])->where('slug','=',$slug)->first();
    }

}
