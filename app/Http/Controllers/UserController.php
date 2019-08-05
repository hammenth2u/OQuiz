<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\AppUser;
//use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param $request Request objet
     */

    public function signup(){
        return view('layout.header').view('partials.nav').view('user.signup').view('layout.footer');
    }

    public function signupPost(Request $request){
        $firstname = $request->input('firstname', '');
        $lastname = $request->input('lastname', '');
        $email = $request->input('mail', '');
        //$passwordCrypt = password_hash($request->input('password',''),1); 
        $passwordCrypt = Hash::make($request->input('password','')); 


        $results = AppUser::insert(['firstname' => $firstname,
                                    'lastname' => $lastname,
                                    'email' => $email,
                                    'password' => $passwordCrypt]);


        return redirect()->route('home') ;

    }

    public function signin(){
        return view('layout.header').view('partials.nav').view('user.signin').view('layout.footer');
    }

    public function signinPost(){

    }

    public function logout(){
        return redirect()->route('home');
    }

    public function profile(){
        return view('layout.header').view('partials.nav').view('profil').view('layout.footer');
    }

}
