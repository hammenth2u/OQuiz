<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param $request Request objet
     */

    public function tags(){
        $tagList = Tag::all();
        return view('layout.header').view('partials.nav').view('tags',['tagList'=>$tagList]).view('layout.footer');
    }

    public function quiz($id){
        $tagUnique = Tag::find($id);

        
        return view('layout.header').view('partials.nav').view('quiztag', ['tagUnique'=>$tagUnique
        ]).view('layout.footer');
    }


}
