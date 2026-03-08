<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Banks Table
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('logo')->nullable(); // Suggestion from original file
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });

        // 2. Users Table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('account_number')->unique();
             $table->string('address');
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');
            $table->decimal('balance', 15, 2)->default(0.00);
            // $table->enum('status', ['Pending', 'Active', 'Suspended'])->default('Pending');
            $table->timestamp('kyc_verified_at')->nullable(); // Suggestion from original file
            $table->timestamps();
        });

        // 3. Admins Table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->enum('role', ['Super Admin', 'Bank Admin', 'Auditor']);
            $table->foreignId('bank_id')->nullable()->constrained('banks')->onDelete('set null');
            $table->enum('status', ['Active', 'Suspended'])->default('Active');
            $table->timestamps();
        });
 
        // 4. Transactions Table
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sender_bank_id')->constrained('banks')->onDelete('cascade');
            $table->foreignId('receiver_bank_id')->constrained('banks')->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->decimal('sender_balance', 15, 2);
            $table->decimal('receiver_balance', 15, 2);
            // $table->string('reference_id')->unique(); // Suggestion from original file
            $table->text('description')->nullable(); // Suggestion from original file
             $table->text('receipt_url')->nullable();
            $table->enum('transaction_type', ['Debit', 'Credit']);
            $table->enum('status', ['Pending', 'Completed', 'Failed'])->default('Pending');
            $table->timestamps();
        });

        // 5. Notifications Table
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->morphs('notifiable'); // For notifiable_id and notifiable_type
            $table->string('title');
            $table->text('message');
            $table->boolean('read_status')->default(false);
            $table->timestamps();
        });
 
        // 6. Bank Accounts Table (Optional)
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bank_id')->constrained('banks')->onDelete('cascade');
            // $table->string('account_number')->unique();
            $table->decimal('premier_balance', 15, 2)->default(0.00);
            $table->decimal('goal_balance', 15, 2)->default(0.00);
            $table->enum('status', ['Active', 'Suspended', 'Closed'])->default('Active');
            $table->decimal('amount_debited', 15, 2)->default(0.00);
            $table->timestamps();
        });

        // 7. Audit / Logs Table
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->morphs('user'); // For user_id and user_type
            $table->string('action');
            $table->text('description')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        // 8. Optional: OTP / Verification Table
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('otp_code');
            $table->enum('purpose', ['Login', 'Transaction', 'Verification']);
            $table->enum('status', ['Pending', 'Used', 'Expired'])->default('Pending');
            $table->timestamp('expires_at');
            $table->timestamps();
        });


          /* 
     * DATABASE SCHEMA & FACTORY SUGGESTION
     * Copy this logic to your migration and factory files later.
     */

        // 1. Migration: create_support_tickets_table.php
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique(); // e.g., #TCK-2024-001
            $table->string('client_name'); // Or foreignId('user_id') if linked to users table
            $table->string('subject');
            $table->text('message'); // The client's inquiry
            $table->string('category'); // transaction_dispute, account_access, technical_issue, general_inquiry
            $table->enum('priority', ['high', 'medium', 'low'])->default('medium');
            $table->enum('status', ['open', 'in_progress', 'resolved', 'closed'])->default('open');
            $table->text('admin_reply')->nullable(); // The admin's response
            $table->string('replied_by')->nullable(); // Name of the admin who replied
            $table->timestamps();
        });


    }


   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otps');
        Schema::dropIfExists('audit_logs');
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');
        Schema::dropIfExists('banks');
    }
};
