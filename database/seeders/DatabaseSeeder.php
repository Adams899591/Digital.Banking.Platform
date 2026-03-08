<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\User;
use App\Models\Admin;
use App\Models\SupportTicket;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // 1. Create 5 Banks
        $banks = Bank::factory(1)->create();

        // 2. Create 5 Admins
        Admin::factory(30)
            ->recycle($banks)
            ->create();

        // 3. Create 10 Users (distributed among the 5 banks)
        // i use 'recycle' to tell Laravel to use the banks we just created
        $users = User::factory(10)
            ->recycle($banks)
            ->create();

        // 4. Create Support Tickets
        SupportTicket::factory(30)
            ->recycle($users)
            ->create();

        
        // 5. Create 100 Transactions
        // i manually create transactions to ensure sender/receiver logic is correct
        Transaction::factory(20)->make()->each(function ($transaction) use ($users) {
            
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
