<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_users';


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}