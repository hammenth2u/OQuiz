<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param $request Request objet
     */

    public function quiz(){
        echo 'page quiz';
    }

    public function quizPost(){
        
    }
}
