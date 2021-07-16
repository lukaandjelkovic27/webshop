<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2,  100, $max = 50000),
            'currency' => $this->faker->randomElement(array ('$','€')),
            'quantity' => $this->faker->randomDigitNotNull(),
            'image_path' => $this->faker->image('public/storage/images',400,300, null, false),
        ];
    }
}
