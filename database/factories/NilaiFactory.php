<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'basdon'         => $this->faker->randomFloat(2, 0, 100),
            'basing'         => $this->faker->randomFloat(2, 0, 100),
            'matematika'     => $this->faker->randomFloat(2, 0, 100),
            'ipa'            => $this->faker->randomFloat(2, 0, 100),
            'ips'            => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
