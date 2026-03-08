<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{ 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            "https://images.unsplash.com/photo-1494790108377-be9c29b29330",
            "https://images.unsplash.com/photo-1500648767791-00dcc994a43e",
            "https://images.unsplash.com/photo-1535713875002-d1d0cf377fde",
            "https://images.unsplash.com/photo-1527980965255-d3b416303d12",
            "https://images.unsplash.com/photo-1544005313-94ddf0286df2",
            "https://images.unsplash.com/photo-1502767089025-6572583495b4",
            "https://images.unsplash.com/photo-1524504388940-b1c1722653e1",
            "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d",
            "https://images.unsplash.com/photo-1492562080023-ab3db95bfbce",
            "https://images.unsplash.com/photo-1534528741775-53994a69daeb",
        ];

       
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'),
            'role' => $this->faker->randomElement(['Super Admin', 'Support Staff', 'Administrator']),
            'bank_id' => Bank::factory(),
            'status' => $this->faker->randomElement(['Active', 'Suspended']),
            'profile_picture' => $this->faker->randomElement($images),
        ];
    }
}
