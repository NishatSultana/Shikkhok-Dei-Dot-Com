<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TutorJob extends Model
{
    protected $dates = ['hiring_time'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function setHiringDateAttribute($value)
    {
        $this->attributes['hiring_time'] = Carbon::parse($value)->format('Y-m-d');
    }
}
