<?php

namespace App;

use App\Notifications\NotifiableWithSender;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use NotifiableWithSender;

    protected $dates = ['dob'];


    protected $fillable = [
        'full_name', 'email', 'password', 'mobile', 'is_staff','email_verification_token'
    ];


    protected $hidden = [
        'password'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::parse($value)->format('d/m/Y');
    }

}
