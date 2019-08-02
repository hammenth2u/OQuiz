<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Quizze;
use App\Models\AppUser;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param $request Request objet
     */

    public function home(){
        $resultQuiz = Quizze::where('status',1)->get();
        $resultAuthor = AppUser::all();
        return view('layout.header').view('partials.nav').view('home',['quizList' => $resultQuiz, 'authorList' => $resultAuthor ]).view('layout.footer');
    }
}
