<?php

namespace Database\Factories;

use App\Models\Category;
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
            'slug' => uniqid(time()),
            'name' => $this->faker->name,
            'category_id' => Category::all()->random()->id,
            'image'=> "image/user.png",
            'description' =>$this->faker->text,
            'price' => 100,
            'view_count' => 100
        ];
    }
}
