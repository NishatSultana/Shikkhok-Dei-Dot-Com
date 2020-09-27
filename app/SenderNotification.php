<?php

namespace App;

use Illuminate\Notifications\DatabaseNotification;

class SenderNotification extends DatabaseNotification
{

    public function sender()
    {
        return $this->morphTo();
    }

    public function notifiable()
    {
        return $this->morphTo();
    }

}
