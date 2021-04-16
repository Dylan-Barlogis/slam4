<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function accueil(){
        return view('accueil');
    }
    public function reglement(){
        return view('reglement');
    }
    public function lesConvocations(){
        return view('convocations');
    }
}
