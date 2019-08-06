<?php

namespace App\Utils;

// TODO : définir le FQCN de la classe User de son projet
use App\Models\AppUser as CurrentUserClass;

// Rappel : "abstract" interdit la création d'objets/instances de UserSession
abstract class UserSession {

    // Constante contenant l'index du tableau de session
    const SESSION_INDEX_NAME = 'connectedUser';

    /**
     * Méthode permettant de connecter un utilisateur
     * 
     * @param CurrentUserClass $user
     */
    public static function connect(CurrentUserClass $user) {
        // On va vider le password hashé sur le user avant de l'ajouter en session
        $user->password = '';
        // self = référence à la classe actuelle
        $_SESSION[self::SESSION_INDEX_NAME] = $user;
    }

    /**
     * Méthode permettant de déconnecter un utilisateur
     */
    public static function disconnect() {
        $_SESSION[self::SESSION_INDEX_NAME] = null;
    }

    /**
     * Méthode permettant de savoir si le visiteur est connecté à un compte
     * 
     * @return bool
     */
    public static function isConnected() : bool {
        if (!empty($_SESSION[self::SESSION_INDEX_NAME])) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Méthode permettant de récupérer le Model de l'utilisateur connecté
     * 
     * @return CurrentUserClass
     */
    public static function getUser() : CurrentUserClass { // on définit le type de la valeur retournée par la méthode
        return $_SESSION[self::SESSION_INDEX_NAME];
    }

    /**
     * Méthode permettant de savoir si l'utilisateur connecté est admin
     * 
     * @return bool
     */
    public static function isAdmin() : bool {
        // On test que le user est connecté
        if (self::isConnected()) {
            // On récupère le Model AppUser
            $user = self::getUser();

            // Si le user a le role admin
            if ($user->role == 'admin') {
                return true;
            }
        }

        return false;
    }
}