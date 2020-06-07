<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;

class SettingsForm extends Controller
{    
    public function index() {
        return view('settings-form');                
    }
}
