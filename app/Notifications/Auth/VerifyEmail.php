<?php

namespace App\Notifications\Auth; 

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends VerifyEmailNotification
{
    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable); // this hold the url

        return (new MailMessage)
            ->view('emails.verify-email', [    // call the view the user is to see on their email
                'user' => $notifiable,
                'verificationUrl' => $verificationUrl,
            ])
            ->subject('Verify Your Email Address - Prestige International Bank');
    }
}
