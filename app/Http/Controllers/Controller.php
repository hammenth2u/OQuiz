<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Utils\UserSession;

class Controller extends BaseController
{
    public function __construct() {
        // On appelle le constructeur de la classe parent
        // on laisse donc Lumen faire sa tambouille
        // parent::__construct();
        // mais le parent n'a pas de constructeur, donc pas besoin

        // On personnalise l'instanciation des Controllers
        if (UserSession::isConnected()) {
            View::share('connectedUser', UserSession::getUser());
        }
        else {
            View::share('connectedUser', false);
        }
    }
    
}
