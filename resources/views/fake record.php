<!-- c:\xampp\htdocs\Bank web app\database\factories\BankFactory.php -->
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company() . ' Bank',
            'code' => $this->faker->unique()->numerify('###'), // Generates 3 random digits
            'logo' => $this->faker->imageUrl(100, 100, 'business', true, 'Bank'),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
 





<!-- c:\xampp\htdocs\Bank web app\database\factories\UserFactory.php -->
<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'), // Default password for everyone
            'account_number' => $this->faker->unique()->bankAccountNumber(),
            'bank_id' => Bank::factory(), // Creates a new bank if one isn't provided
            'balance' => $this->faker->randomFloat(2, 0, 100000),
            'status' => $this->faker->randomElement(['Pending', 'Active', 'Suspended']),
            'kyc_verified_at' => $this->faker->boolean(80) ? now() : null, // 80% chance of being verified
        ];
    }
}





<!-- c:\xampp\htdocs\Bank web app\database\factories\AdminFactory.php -->
<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'username' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('password'),
            'role' => $this->faker->randomElement(['Super Admin', 'Bank Admin', 'Auditor']),
            'bank_id' => Bank::factory(),
            'status' => $this->faker->randomElement(['Active', 'Suspended']),
        ];
    }
}





<!-- c:\xampp\htdocs\Bank web app\database\factories\TransactionFactory.php -->
<?php

namespace Database\Factories;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition()
    {
        return [
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'sender_bank_id' => Bank::factory(),
            'receiver_bank_id' => Bank::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 5000),
            'reference_id' => $this->faker->unique()->uuid(),
            'description' => $this->faker->sentence(),
            'transaction_type' => $this->faker->randomElement(['Debit', 'Credit']),
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
        ];
    }
}


  // 2. Factory: SupportTicketFactory.php
    public function definition(): array
    {
        $status = $this->faker->randomElement(['open', 'in_progress', 'resolved', 'closed']);
        // Only add a reply if the ticket is resolved or closed
        $hasReply = in_array($status, ['resolved', 'closed']);

        return [
            'reference'   => '#TCK-' . date('Y') . '-' . $this->faker->unique()->numberBetween(100, 999),
            'client_name' => $this->faker->name(),
            'subject'     => $this->faker->sentence(4),
            'message'     => $this->faker->paragraph(2),
            'category'    => $this->faker->randomElement(['transaction_dispute', 'account_access', 'technical_issue', 'general_inquiry']),
            'priority'    => $this->faker->randomElement(['high', 'medium', 'low']),
            'status'      => $status,
            'admin_reply' => $hasReply ? $this->faker->paragraph(2) : null,
            'replied_by'  => $hasReply ? 'Admin User' : null,
            'created_at'  => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at'  => now(),
        ];
    }


<!-- c:\xampp\htdocs\Bank web app\database\seeders\DatabaseSeeder.php -->
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;
use App\Models\User;
use App\Models\Admin;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Create 5 Banks
        $banks = Bank::factory(5)->create();

        // 2. Create 50 Users (distributed among the 5 banks)
        // We use 'recycle' to tell Laravel to use the banks we just created
        $users = User::factory(50)
            ->recycle($banks)
            ->create();

        // 3. Create 5 Admins
        Admin::factory(5)
            ->recycle($banks)
            ->create();

        // 4. Create 100 Transactions
        // We manually create transactions to ensure sender/receiver logic is correct
        Transaction::factory(100)->make()->each(function ($transaction) use ($users) {
            
            // Pick random sender and receiver from our created users
            $sender = $users->random();
            $receiver = $users->where('id', '!=', $sender->id)->random();

            $transaction->sender_id = $sender->id;
            $transaction->sender_bank_id = $sender->bank_id;
            
            $transaction->receiver_id = $receiver->id;
            $transaction->receiver_bank_id = $receiver->bank_id;

            $transaction->save();
        });
    }
}



php artisan make:model Bank
php artisan make:model Admin
php artisan make:model Transaction
# User model usually exists by default



php artisan db:seed


php artisan migrate:fresh --seed
