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
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique(); // e.g., #TCK-2024-001
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->string('client_name'); // Or foreignId('user_id') if linked to users table
            $table->string('subject');
            $table->text('message'); // The client's inquiry
            $table->string('category'); // transaction_dispute, account_access, technical_issue, general_inquiry
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('Medium');
            $table->enum('status', ['Not Open', 'In Progress', 'Resolved',])->default('Not Open');
            $table->text('admin_reply')->nullable(); // The admin's response
            $table->string('replied_by')->nullable(); // Name of the admin who replied
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
