<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Media;
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
            ->count(10)
            ->has(Media::factory()->count(2)) // Adjust the count as needed for media
            ->create();
    }
}
