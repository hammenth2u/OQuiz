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

    
    /******************Test pour les Tags ******************/
    public function tags()
    {
        // Many to Many => belongsToMany
        // 1er argument => Classe de "destination"
        // 2e argument => nom de la table pivot/table de correspondance
        // 3e argument => nom de la clé étrangère faisant le lien vers le Model actuel (Quiz)
        // 4e argument => nom de la clé étrangère faisant le lien vers l'autre Model (Tag)
        return $this->belongsToMany('App\Models\Tag','quizzes_has_tags','quizzes_id','tags_id');
    }

}