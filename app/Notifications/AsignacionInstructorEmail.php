<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AsignacionInstructorEmail extends Notification
{
    use Queueable;

    public $ficha;
    /**
     * Create a new notification instance.
     */
    public function __construct($ficha)
    {
        $this->ficha = $ficha;
    }

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
        return (new MailMessage)
                    ->subject('Notificación de Asignación de Ficha.')
                    ->view('emails.asignacion_instructor',
                        ['ficha' =>$this->ficha, 'instructor' => $this->ficha->instructor,
                        'programa' => $this->ficha->programa]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
