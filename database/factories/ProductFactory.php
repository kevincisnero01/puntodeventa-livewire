<?php

namespace Database\Factories;

use App\Enums\ProductStatusEnum;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();
        $slug = Str::slug($name,'-');
        
        return [
            'code' => fake()->isbn10(),
            'name' => $name,
            'slug' => $slug,
            'stock' => 100,
            'sell_price' => 10,
            'short_description' => fake()->sentence(),
            'long_description' => fake()->sentence(5),
            'status' => fake()->randomElement(ProductStatusEnum::values()),
            'category_id' => Category::all()->random()->id,
            'provider_id' => Provider::all()->random()->id,
        ];
    }
}
