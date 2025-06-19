<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
// database/factories/TransactionFactory.php
public function definition(): array
{
    return [
        'description' => $this->faker->sentence(3),
        'amount' => $this->faker->numberBetween(10000, 1000000),
        'type' => $this->faker->randomElement(['pemasukan', 'pengeluaran']),
        'transaction_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
    ];
}
}
