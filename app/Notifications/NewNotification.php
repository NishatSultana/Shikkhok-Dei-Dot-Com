<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification
{
    use Queueable;
    public $sender_id;
    public $message;

    public function __construct($sender_id, $message)
    {
        $this->sender_id = $sender_id;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [NotificationChannel::class];
    }

    public function toArray($notifiable)
    {
        return [
            'sender_id' => $this->sender_id,
            'message' => $this->message
        ];
    }
}
