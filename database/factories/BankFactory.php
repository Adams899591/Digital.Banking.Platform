<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company() . ' Bank';
        $color = ltrim($this->faker->hexColor(), '#');

        return [
            'name' => $name,
            'code' => $this->faker->unique()->numerify('###'), // Generates 3 random digits
            'logo' => "https://ui-avatars.com/api/?name=" . urlencode($name) . "&background={$color}&color=fff",
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
 