<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public $model = Company::class;
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
            "country" => $this->faker->countryCode(),
            "city" => $this->faker->city(),
            "user_id" => 1,
        ];
    }
}
