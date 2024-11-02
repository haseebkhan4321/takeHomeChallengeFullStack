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
            ->create([
                'category_id' => Category::inRandomOrder()->first()->id,
                'source_id' => Source::inRandomOrder()->first()->id,
                'author_id' => Author::inRandomOrder()->first()->id,
            ]);
    }
}
