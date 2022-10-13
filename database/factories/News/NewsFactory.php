<?php

namespace Database\Factories\News;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 5),
            'source_id' => fake()->numberBetween(1, 5),
            'title' => fake()->jobTitle(),
            'short_description' => fake()->realText(50),
            'description' => fake()->realText(200),
            'image' => '',
            'is_private' => fake()->boolean,
        ];
    }
}
