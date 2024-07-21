<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->text,
            'image'=>$this->faker->imageUrl,
            'category_id'=>Category::inRandomOrder()->first()->id,
            'user_id'=>User::inRandomOrder()->first()->id
        ];
    }
}
