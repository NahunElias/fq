<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identification' => $this->faker->randomNumber(),
            'name' => $this->faker->userName(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
