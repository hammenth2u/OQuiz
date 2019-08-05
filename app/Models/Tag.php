<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{


    public function quizList()
    {
        // Many to Many => belongsToMany
        // 1er argument => Classe de "destination"
        // 2e argument => nom de la table pivot/table de correspondance
        // 3e argument => nom de la clé étrangère faisant le lien vers le Model actuel (Tag)
        // 4e argument => nom de la clé étrangère faisant le lien vers l'autre Model (Quiz)
        return $this->belongsToMany('App\Models\Quizze', 'quizzes_has_tags', 'tags_id', 'quizzes_id');
    }

 
}