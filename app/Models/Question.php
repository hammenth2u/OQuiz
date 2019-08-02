<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function answers(){
        return $this->hasMany('App\Models\Answer', 'questions_id');
    }

    public function levels(){
        return $this->belongsTo('App\Models\Level', 'levels_id');
    }
    

}