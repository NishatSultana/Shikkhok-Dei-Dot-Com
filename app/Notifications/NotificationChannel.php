<?php


namespace App\Notifications;


use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Notifications\Notification;

class NotificationChannel extends DatabaseChannel
{
    public function send($notifiable, Notification $notification)
    {
        return $notifiable->routeNotificationFor('database', $notification)->create(
            $this->buildPayload($notifiable, $notification)
        );
    }

    protected function buildPayload($notifiable, Notification $notification)
    {
        $data = $this->getData($notifiable, $notification);

        return [
            'id' => $notification->id,
            'type' => get_class($notification),
            'data' => $data,
            'read_at' => null,
            'sender_type' => 'App\User',
            'sender_id' => $data['sender_id']
        ];
    }
}
