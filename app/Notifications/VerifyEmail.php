<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmail extends Notification
{
    use Queueable;



    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
   $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return (new MailMessage)
            ->subject('Confirma tu cuenta en CashTrackr')
            ->greeting('!Gracias por registrarte en CashTrackr!')
            ->line('Tu cuenta ha sido creada exitosamente. Para confirmar tu cuenta, haz clic en el siguiente enlace:')
            ->action('Confirmar Cuenta', $verificationUrl)
            ->line('Si no has creado una cuenta, puedes ignorar este correo electrónico.')
            ->salutation('Saludos  CashTrackr Team');


    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

}
