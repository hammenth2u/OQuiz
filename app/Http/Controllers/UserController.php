<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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

    public function signupPost(){

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
