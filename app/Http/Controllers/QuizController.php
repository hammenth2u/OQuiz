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
use App\Models\Tag;
use App\Models\QuizzeHasTag;
use App\Utils\UserSession;

class QuizController extends Controller
{

    public function quiz($id){

        $quizIdUnique = Quizze::find($id);
        $listQuestion = $quizIdUnique->questions;
        

        return view('quiz.quizcons', ['quizIdUnique'=>$quizIdUnique,'listQuestion'=>$listQuestion]);
    
    }

    public function quizPost(Request $request,$id){

        $quizIdUnique = Quizze::find($id);
        $listQuestion = $quizIdUnique->questions;

        return view('quiz.quizcons', ['quizIdUnique'=>$quizIdUnique,'listQuestion'=>$listQuestion]);;;
    }
}
