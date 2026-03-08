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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receiver_id');
            $table->foreignId('sender_id'); // Can be user or agent
            $table->text('message')->nullable();
            $table->string("file_path")->nullable();
            $table->timestamp('read_at')->nullable();
            $table->string("status")->nullable();
            $table->string("sender_type")->nullable();
            $table->string("receiver_type")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
