<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Form extends Controller
{
    public function index() {
        return view('form');
    }
    
    public function post(Request $request) {
        dd($request->all());
    }    
}
