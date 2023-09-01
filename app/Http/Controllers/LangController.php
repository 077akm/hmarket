<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function switchLang($lang, Request $request){
        if (array_key_exists($lang, config('app.languages'))){
            $request->session()->put('mylocale', $lang);
        }
        return back();
    }


    public function langbet(){


        return view('documents.lang');
    }
}
