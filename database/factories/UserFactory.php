<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        
        // 
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
            "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d",
            "https://images.unsplash.com/photo-1517841905240-472988babdf9",
            "https://images.unsplash.com/photo-1521119989659-a83eee488004",
            "https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e",
            "https://images.unsplash.com/photo-1519345182560-3f2917c472ef",
            "https://images.unsplash.com/photo-1531123897727-8f129e1688ce",
            "https://images.unsplash.com/photo-1511367461989-f85a21fda167",
            "https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91",
            "https://images.unsplash.com/photo-1544723795-3fb6469f5b39",
            "https://images.unsplash.com/photo-1521572163474-6864f9cf17ab",
            "https://images.unsplash.com/photo-1522075469751-3a6694fb2f61",
            "https://images.unsplash.com/photo-1520813792240-56fc4a3765a7",
            "https://images.unsplash.com/photo-1539571696357-5a69c17a67c6",
            "https://images.unsplash.com/photo-1504257432389-52343af06ae3",
            "https://images.unsplash.com/photo-1547425260-76bcadfb4f2c",
            "https://images.unsplash.com/photo-1517423440428-a5a00ad493e8",
            "https://images.unsplash.com/photo-1524503033411-c9566986fc8f",
            "https://images.unsplash.com/photo-1519085360753-af0119f7cbe7",
            "https://images.unsplash.com/photo-1499951360447-b19be8fe80f5",
            "https://images.unsplash.com/photo-1506863530036-1efeddceb993",
            "https://images.unsplash.com/photo-1545996124-0501ebae84d0",
            "https://images.unsplash.com/photo-1496346236646-50e985b31ea4",
            "https://images.unsplash.com/photo-1517638851339-4aa32003c11a",
            "https://images.unsplash.com/photo-1519340333755-c4f2e3f7b6c6",
            "https://images.unsplash.com/photo-1519699047748-de8e457a634e",
            "https://images.unsplash.com/photo-1492724441997-5dc865305da7",
            "https://images.unsplash.com/photo-1504593811423-6dd665756598",
            "https://images.unsplash.com/photo-1515378791036-0648a3ef77b2",
            "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee",
            "https://images.unsplash.com/photo-1520975916090-3105956dac38",
            "https://images.unsplash.com/photo-1513245543132-31f507417b26",
            "https://images.unsplash.com/photo-1492447166138-50c3889fccb1",
            "https://images.unsplash.com/photo-1527010154944-f2241763d806",
            "https://images.unsplash.com/photo-1506089676908-3592f7389d4d",
            "https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e",
            "https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9",
            "https://images.unsplash.com/photo-1494790108755-2616c9c2c2d3",
            "https://images.unsplash.com/photo-1508216310976-c518daae0cdc",
            "https://images.unsplash.com/photo-1493666438817-866a91353ca9",
            "https://images.unsplash.com/photo-1494790108755-2616c9c2c2d3"
        ];

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'), // Default password for everyone
            'account_number' => $this->faker->unique()->numerify('############'),
            "address" => $this->faker->address(),
            'bank_id' => Bank::factory(), // Creates a new bank if one isn't provided
            'balance' => $this->faker->randomFloat(2, 0, 100000),
            'profile_picture' => $this->faker->randomElement($images),
            'status' => $this->faker->randomElement(['Pending', 'Active', 'Suspended']),
            'kyc_verified_at' => $this->faker->boolean(80) ? now() : null, // 80% chance of being verified
            // 'email_verified_at' => now() , 
            "assigned_admin_id" => \App\Models\Admin::inRandomOrder()->value('id'),
            'remember_token' => Str::random(10),
            "created_at" => $this->faker->dateTimeBetween('2026-01-01', '2026-12-31'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            BankAccount::factory()->create([
                'user_id' => $user->id,
                'bank_id' => $user->bank_id,
            ]);
        });
    }
}
