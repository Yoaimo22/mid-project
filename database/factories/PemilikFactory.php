<?php

namespace Database\Factories;
use App\Models\pemilik;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemilik>
 */
class PemilikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => pemilik::factory(),
            'pemilik_name' => fake()->name(),
            'tempat_lahir' => fake()->address()
        ];
    }
}
