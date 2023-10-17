<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        $email = strtolower(str_replace([' ',',','_','-'], '', $name)).'@gmail.com';

        return [
            'name' => $name,
            'email' => $email,
            'rif' => fake()->numerify('J#########'),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
