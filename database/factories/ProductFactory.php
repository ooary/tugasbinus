<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $price = $this->faker->randomFloat(2, 10000, 1000000); // Price in IDR cents
        $margin = $this->faker->numberBetween(5, 30);
        $salesPrice = $price + ($price * ($margin / 100));

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $price,
            'stock' => $this->faker->numberBetween(1, 100),
            'margin' => $margin,
            'sales_price' => $salesPrice,
        ];
    }
}
