<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'sender_bank_id' => Bank::factory(),
            'receiver_bank_id' => Bank::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 5000),
            'sender_balance' => $this->faker->randomFloat(2, 10, 20000),
            'receiver_balance' => $this->faker->randomFloat(2, 10, 20000),
            'reference_id' => $this->faker->unique()->uuid(),
            'description' => $this->faker->sentence(),
            'transaction_type' => $this->faker->randomElement(['Debit', 'Credit']),
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
        ];
    }
}
