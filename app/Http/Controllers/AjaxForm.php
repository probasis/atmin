<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxForm extends Controller
{
    public function index() {
        return view('ajax-form');
    }
    
    public function post(Request $request) {
        $validatedData = $request->validate([
            'text_field'     => 'required|email|min:20',
            'textarea_field' => 'required|min:20',
        ]);
        
        return 'success';
    }    
}
