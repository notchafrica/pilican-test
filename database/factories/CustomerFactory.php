<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" > $this->faker->name(),
            "email" => $this->faker->safeEmail(),
            "phone" => $this->faker->phoneNumber(),
            "balance" => rand(-10000, 1000000),
        ];
    }
}
