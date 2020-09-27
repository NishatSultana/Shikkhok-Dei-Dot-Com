<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherTestimonial extends Model
{
    protected $fillable = [];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
}
