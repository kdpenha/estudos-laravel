<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    //
    public function index(Request $request) {
        return view('site.sobrenos');
    } 
}
