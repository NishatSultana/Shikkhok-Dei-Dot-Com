<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'codename'
    ];

    public function module()
    {
    	return $this->belongsTo(Module::class);
    }

    public function groups()
    {
    	return $this->belongsToMany(Group::class);
    }
}
