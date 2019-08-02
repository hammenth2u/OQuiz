<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    
    public function level(){
        return $this->hasMany('App\Models\Question','levels_id');
    }

}