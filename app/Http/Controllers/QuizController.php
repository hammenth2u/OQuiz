<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Quizze;
use App\Models\AppUser;
use App\Models\Question;
use App\Models\Level;
use App\Models\Answer;

class QuizController extends Controller
{

    public function quiz($id){

        $quizIdUnique = Quizze::find($id);
        $listQuestion = $quizIdUnique->questions;


        foreach($listQuestion as $question)
        {
            $getAnswers = Question::find($question->id);
            $answers[] = $getAnswers->answers;
    
        }





        return view('layout.header').view('partials.nav').view('quizcons', ['quizIdUnique'=>$quizIdUnique,
                                                                            'listQuestion'=>$listQuestion,
                                                                            'answers'=> $answers
                                                                            ]).view('layout.footer');
    }

    public function quizPost(){
        return view('layout.header').view('partials.nav').view('quizcons').view('layout.footer');
    }
}
