<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleForm extends Controller
{
    public function index() {
        return view('simple-form');
    }
    
    public function post(Request $request) {
        return view('simple-form-result', [
            'request' => $request->all()
        ]);        
    }    
}
