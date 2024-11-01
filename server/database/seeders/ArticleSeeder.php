<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Media;
use App\Models\Source;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()
            ->count(1000)
            ->has(Media::factory()->count(2))
            ->for(Category::factory(), 'category')
            ->for(Source::factory(), 'source')
            ->for(Author::factory(), 'author')
            ->create();
    }
}
