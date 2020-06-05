<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudTable extends Controller
{
    public function index() {        
        return view('crud-table');
    }
}
