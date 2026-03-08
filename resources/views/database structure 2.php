<?php
{{--

Here is the suggested database structure and factory records based on the components in this view.

======================================================================
DATABASE MIGRATIONS
======================================================================

/**
 * 2026_02_26_000001_create_faq_categories_table.php
 *
 * For the "Common Topics" section.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('icon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_categories');
    }
};

/**
 * 2026_02_26_000002_create_faq_items_table.php
 *
 * For the "Frequently Asked Questions" section.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_category_id')->constrained()->onDelete('cascade');
            $table->string('question');
            $table->text('answer');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_items');
    }
};

/**
 * 2026_02_26_000003_create_support_tickets_table.php
 *
 * For the "Create Ticket Modal".
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('category');
            $table->string('subject');
            $table->text('message');
            $table->string('status')->default('open'); // e.g., open, in_progress, closed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('support_tickets');
    }
};

/**
 * 2026_02_26_000004_create_chat_sessions_table.php
 *
 * For the "Live Chat Modal". Represents a conversation.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('users')->onDelete('set null'); // Assuming agents are also users with a specific role
            $table->string('status')->default('active'); // e.g., active, closed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_sessions');
    }
};



/**
 * 2026_02_26_000005_create_chat_messages_table.php
 *
 * For the "Live Chat Modal". Represents individual messages in a conversation.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_session_id')->constrained()->onDelete('cascade');
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // Can be user or agent
            $table->text('message');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
};


======================================================================
MODEL FACTORIES
======================================================================

/**
 * FaqCategoryFactory.php
 */
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class FaqCategoryFactory extends Factory {
    public function definition() {
        return [ 'name' => $this->faker->words(3, true), 'description' => $this->faker->sentence, 'icon' => 'fa-solid fa-question-circle' ];
    }
}

/**
 * FaqItemFactory.php
 */
namespace Database\Factories;
use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
class FaqItemFactory extends Factory {
    public function definition() {
        return [ 'faq_category_id' => FaqCategory::factory(), 'question' => rtrim($this->faker->sentence, '.') . '?', 'answer' => $this->faker->paragraph(2) ];
    }
}

/**
 * SupportTicketFactory.php
 */
namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
class SupportTicketFactory extends Factory {
    public function definition() {
        return [ 'user_id' => User::factory(), 'category' => $this->faker->randomElement(['transaction_dispute', 'account_access', 'technical_issue', 'general_inquiry']), 'subject' => $this->faker->sentence, 'message' => $this->faker->paragraphs(3, true), 'status' => 'open' ];
    }
}

/**
 * ChatSessionFactory.php & ChatMessageFactory.php would be similar,
 * linking users to a session and messages to that session.
 */

--}}