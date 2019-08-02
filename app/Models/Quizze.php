<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    public function appUser()
    {
        return $this->belongsTo('App\Models\AppUser','app_users_id');
    }
    public function questions(){
        return $this->hasMany('App\Models\Question','quizzes_id');
    }


}