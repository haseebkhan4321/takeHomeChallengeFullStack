<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany(Article::class, 'preferable_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'preferable_id', 'id');
    }

    public function sources()
    {
        return $this->hasMany(Source::class, 'preferable_id', 'id');
    }
    public function authors()
    {
        return $this->hasMany(Author::class, 'preferable_id', 'id');
    }
}
