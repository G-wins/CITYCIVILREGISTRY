<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;


class NewAppointmentNotification extends Notification
{
    use Queueable;

    protected $appointmentData;

    public function __construct($appointmentData)
    {
        $this->appointmentData = $appointmentData;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'name' => $this->appointmentData['name'],
            'document_type' => $this->appointmentData['document_type'],
            'submitted_at' => $this->appointmentData['submitted_at'],
        ];
    }
}
