<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupportTicket>
 */
class SupportTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Define possible status and priority combinations
         $options= [ ["status" => 'Not Open', "piority" => 'High'],
                    ["status" => 'In Progress', "piority" => 'Medium'],
                    ["status" => 'Resolved', "piority" => 'Low'],
         ];

         // Randomly select one of the combinations
        $selected = $this->faker->randomElement($options);

        // Extract the selected status and priority
         $status = $selected['status'];
         $priority = $selected['piority'];

        // Only add a reply if the ticket is resolved or closed
        $hasReply = in_array($status, ['Resolved', 'In Progress']);

        return [
            'reference'   => '#TCK-' . date('Y') . '-' . $this->faker->unique()->numberBetween(100, 999),
            'user_id'     => User::factory(),
            'subject'     => $this->faker->sentence(4),
            'message'     => $this->faker->paragraph(2),
            'category'    => $this->faker->randomElement(['Transaction Dispute', 'Account Access', 'Technical Issue', 'General Inquiry']),
            'priority'    => $priority,
            'status'      => $status,
            'admin_reply' => $hasReply ? $this->faker->paragraph(2) : null,
            'replied_by'  => $hasReply ? 'Admin User' : null,
            "created_at" => $this->faker->dateTimeBetween('2026-01-01', '2026-12-31'),
        ];
    }
}
