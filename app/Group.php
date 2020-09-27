<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
