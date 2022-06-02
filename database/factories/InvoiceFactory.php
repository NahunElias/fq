<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $customer = Customer::inRandomOrder()->first();
      

        return [
            'code' => $this->faker->randomNumber(),
            'expedition_date' => now(),
            'status' => $this->faker->randomElement(['credito' ,'credito parcial', 'de contado']),
            'balance' => $this->faker->randomNumber(),
            'canceled' => $this->faker->boolean(),
            'customer_id' => $customer->id,
        ];
    }
}
