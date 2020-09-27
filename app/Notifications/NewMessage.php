<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification
{
    use Queueable;
    public $recipient;
    public $subject;
    public $message;
    public $attachments;
    public $sender_id;

    public function __construct($recipient, $subject, $message, $attachments, $sender_id)
    {
        $this->recipient = $recipient;
        $this->subject = $subject;
        $this->message = $message;
        $this->attachments = json_encode($attachments);
        $this->sender_id = $sender_id;
    }

    public function via($notifiable)
    {
        return [MessageChannel::class];
    }

    public function toArray($notifiable)
    {
        return [
            'recipient' =>  $this->recipient,
            'subject' => $this->subject,
            'message' => $this->message,
            'attachments' => $this->attachments,
            'sender_id' => $this->sender_id
        ];
    }
}
