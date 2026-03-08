<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

         $premier =   $this->faker->randomFloat(2, 1_000, 5_000_000);
         $goal =   $this->faker->randomFloat(2, 500, $premier);
         $debited = $goal * 0.01;
         
        return [
            "user_id" => User::factory(),
            "bank_id" => Bank::factory(),
            "premier_balance" => $premier,
            "goal_balance" => $goal,
            "amount_debited" => $debited,
            "status" => $this->faker->randomElement(['Active', 'Suspended', 'Closed']),
            "account_type" => $this->faker->randomElement(['Savings', 'Checking', 'Investment']),
            "created_at" => $this->faker->dateTimeBetween('2026-01-01', '2026-12-31'),
        ];
    }
}
