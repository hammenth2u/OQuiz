<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\AppUser;
use App\Utils\UserSession;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param $request Request objet
     */

/*##################################################################################################################################*/
/*##################################################################################################################################*/
    public function signup(){
        $inputValues = [
            'lastname' => '',
            'firstname' => '',
            'email' => ''
        ];
        return view('user.signup',['inputValues'=>$inputValues]);
    }
/*##################################################################################################################################*/
/*##################################################################################################################################*/

    public function signupPost(Request $request) {
        // dump($_POST); // old school
        // On va récupérer les données envoyées par le formulaire
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $email = $request->input('mail');
        $password = $request->input('password');
        $passwordConfirm = $request->input('password2');

        // On initialise le tableau contenant les valeurs pour le formulaire
        $inputValues = [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email
        ];

        // Validation des données
        $errorList = [];

        // Si le nom est vide
        if (empty($lastname)) {
            $errorList[] = 'Le nom ne doit pas être vide';
        }
        else if (strlen($lastname) < 2) {
            $errorList[] = 'Le nom doit contenir au moins 2 caractères';
        }
        if (empty($firstname)) {
            $errorList[] = 'Le prénom ne doit pas être vide';
        }
        else if (strlen($firstname) < 2) {
            $errorList[] = 'Le prénom doit contenir au moins 2 caractères';
        }
        if (empty($email)) {
            $errorList[] = 'L\'adresse email ne doit pas être vide';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'L\'adresse email n\'est pas valide';
        }
        if (empty($password)) {
            $errorList[] = 'Le mot de passe ne doit pas être vide';
        }
        else if (strlen($password) < 8) {
            $errorList[] = 'Le mot de passe doit contenir au moins 8 caractères';
        }
        // Si les mots de passe sont différents
        if ($password != $passwordConfirm) {
            $errorList[] = 'Les deux mots de passe sont différents';
        }

        // Si les données sont ok = $errorList vide
        if (empty($errorList)) {
            // TODO vérifier que l'email n'est pas déjà en DB

            // Alors on ajoute en DB
            // 1-créer un model vide
            $newUser = new AppUser();
            // 2-remplir ce model avec les données du formulaire
            $newUser->email = $email;
            $newUser->password = password_hash($password, PASSWORD_DEFAULT);
            $newUser->lastname = $lastname;
            $newUser->firstname = $firstname;
            $newUser->role = 'user'; // le role par défaut
            // 3-on ajoute dans la table
            $newUser->save();

            // -- annule -- On redirige vers la page de connexion
            // return redirect()->route('signin');
            // connecter le user
            UserSession::connect($newUser);
            // rediriger sur l'accueil
            return redirect()->route('home');
        }
        // Sinon
        else {
            // On affiche les erreurs, sur la page d'inscription
            return view(
                'user.signup',
                [
                    'errorList' => $errorList,
                    'inputValues' => $inputValues
                ]
            );
        }
    }

/*##################################################################################################################################*/
/*##################################################################################################################################*/
    public function signin(){

        // On initialise le tableau contenant les valeurs pour le formulaire
        $inputValues = [
            'email' => ''
        ];
    
        return view('user.signin',['inputValues' => $inputValues]);
    }
/*##################################################################################################################################*/
/*##################################################################################################################################*/

    public function signinPost(Request $request) {
        // On va récupérer les données envoyées par le formulaire
        $email = $request->input('mail');
        $password = $request->input('password');

        // On initialise le tableau contenant les valeurs pour le formulaire
        $inputValues = [
            'email' => $email
        ];

        // Validation des données
        $errorList = [];

        // Si l'email est vide
        if (empty($email)) {
            $errorList[] = 'L\'adresse email ne doit pas être vide';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'L\'adresse email n\'est pas valide';
        }
        if (empty($password)) {
            $errorList[] = 'Le mot de passe ne doit pas être vide';
        }
        else if (strlen($password) < 8) {
            $errorList[] = 'Le mot de passe doit contenir au moins 8 caractères';
        }

        // Si les données sont ok = $errorList vide
        if (empty($errorList)) {
            // On récupère les données sur le user (grâce à son email)
            /*
                SELECT *
                FROM app_user
                WHERE email = "$email"
            */
            // ->first() car je sais qu'il n'y aura qu'un seul résultat
            $currentUser = AppUser::where('email', $email)->first();

            // Si on a bien trovué un user pour cet email
            if (!empty($currentUser)) {
                // On vérifie que le mot de passe saisie correspond au hash en DB
                if (password_verify($password, $currentUser->password)) {
                    // On va connecter le user en session
                    UserSession::connect($currentUser);

                    // rediriger vers l'accueil
                    return redirect()->route('home');
                }
                else {
                    $errorList[] = 'Email et/ou mot de passe incorrect(s)';
                }
            }
            else {
                $errorList[] = 'Email et/ou mot de passe incorrect(s)';
            }
        }
        
        // On affiche les erreurs, sur la page d'inscription
        return view(
            'user.signin',
            [
                'errorList' => $errorList,
                'inputValues' => $inputValues
            ]
        );
    }
/*##################################################################################################################################*/
/*##################################################################################################################################*/

    public function logout(){

        // Déconneter le user courant
        UserSession::disconnect();
        return redirect()->route('home');
    }
/*##################################################################################################################################*/
/*##################################################################################################################################*/

    public function profile(){
        return view('user.profil');
    }
/*##################################################################################################################################*/
/*##################################################################################################################################*/
    public function admin(){
        if (UserSession::isConnected()) {
            // On test que le user soit un admin
            if (UserSession::isAdmin()) {
                
                //$platformList = Platform::orderBy('name')->get();
              
                return view('user.admin');
            }
            else {
                // On retourne le code erreur HTTP 403 forbidden
                abort(403);
            }
        }
        // Sinon
        else {
            // On le redirige vers la page de connexion
            return redirect()->route('signin');
        }

    }
/*##################################################################################################################################*/
/*##################################################################################################################################*/
    public function adminPost(){

    }
}
