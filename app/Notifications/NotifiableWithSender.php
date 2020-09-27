<?php


namespace App\Notifications;

use App\SenderNotification;
use Illuminate\Notifications\Notifiable;

trait NotifiableWithSender
{
    use Notifiable;

    public function notifications()
    {
        return $this->morphMany(SenderNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

    public function messages()
    {
        return $this->morphMany(SenderNotification::class, 'sender')->orderBy('created_at', 'desc');
    }


}
