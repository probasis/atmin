<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;
use Illuminate\Support\Facades\DB;

class SettingsResource extends Controller
{    
    public function index() {
        return DB::table('settings')->select()->get()
            ->mapWithKeys(function($i){            
                return [$i->name => $i->value];
            });
    }

    public function update(Request $request) {        
        foreach($request->all() as $name => $value) {
            DB::table('settings')->updateOrInsert(
                ['name'  => $name],
                ['value' => $value]                 
            );                                
        }        
    }
}
