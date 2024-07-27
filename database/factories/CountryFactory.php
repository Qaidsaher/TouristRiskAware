<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $languages = ['English', 'Spanish', 'French', 'German', 'Chinese', 'Japanese'];
        return [
            'name' => $this->faker->country,
            'capital' => $this->faker->city,
            'language' => $this->faker->randomElement($languages),
            'population' => $this->faker->numberBetween(1000000, 100000000),
            'image' => $this->faker->imageUrl(),
            'overview' => $this->faker->paragraph,
        ];
    }
}
