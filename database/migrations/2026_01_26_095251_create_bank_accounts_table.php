<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. 
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');
            // $table->string('account_number')->unique();
            $table->decimal('premier_balance', 15, 2)->default(0.00);
            $table->decimal('goal_balance', 15, 2)->default(0.00);
            $table->decimal('amount_debited', 15, 2)->default(0.00);
            $table->enum('status', ['Active', 'Suspended', 'Closed'])->default('Active');
            $table->enum('account_type', ['Savings', 'Checking', 'Investment'])->default('Savings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
