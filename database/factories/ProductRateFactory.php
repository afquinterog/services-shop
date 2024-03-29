<?php

namespace Database\Factories;

use App\Models\ProductRate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductRateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductRate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->randomNumber(4),
        ];
    }
}
