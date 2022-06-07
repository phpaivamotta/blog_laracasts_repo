<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // original
            // 'name' => $this->faker->word,
            // 'slug' => $this->faker->slug

            // my modifications
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug()
        ];
    }
}
