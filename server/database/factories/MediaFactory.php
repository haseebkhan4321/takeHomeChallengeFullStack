<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->imageUrl(),
            'mediable_id' => \App\Models\Article::factory(), // Assuming Article is the related model
            'mediable_type' => \App\Models\Article::class, // Specify the type of the morph relation
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
