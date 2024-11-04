<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Source;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preference>
 */
class PreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $preferableType = $this->faker->randomElement([Category::class, Article::class,Author::class,Source::class]);
        $preferable = $preferableType::inRandomOrder()->first();
        $user =  User::inRandomOrder()->first();
        return [
            'user_id'=>$user->id,
            'preferable_id' => $preferable->id,
            'preferable_type' => $preferableType,
        ];
    }
}
