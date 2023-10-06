<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$factory->define(App\Order::class, function (Faker $faker) {
            return [
                'name' => $this->faker->name(),
                'item_count' => rand(1,10),
            ];
        //});
    }
}
