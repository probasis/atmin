<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;

class DemoResource extends Controller
{    
    public function index(Request $request) {
        //return ['data'=>Demo::all()];
        
        $res = Demo::orderBy('id', 'desc');
        if($request->search) {            
            $res->where  ('title', 'LIKE', '%'.$request->search.'%');
            $res->orWhere('text',  'LIKE', '%'.$request->search.'%');               
        }        
        return $res->paginate(10);        
    }

    public function create() {        
        return new Demo;
    }

    public function store(Request $request)  {    
        $demo = new Demo;
        $demo->fill($request->all());
        $demo->save();        
    }

    public function show(Demo $demo) {
        return $demo;
    }

    public function edit(Demo $demo) {
        return $demo;
    }

    public function update(Demo $demo, Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'text'  => 'required|min:10',
        ]);        
        $demo->fill($request->all());
        $demo->save();
    }

    public function destroy(Demo $demo) {  
        //abort(403, 'Ooops');
        $demo->delete();
    }
}
