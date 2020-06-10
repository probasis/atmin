<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait CrudTrait {   
    protected $model = 'MyModel';
    protected $validationRules = [
        'title' => 'required',
        'text'  => 'required|min:10',
    ];
    protected $searchableFields = ['title', 'text'];
    protected $filteredFields = [];
    protected $perPage = 10;
    protected $orderField = 'id';
    protected $orderDirection = 'desc';    
    
    public function index(Request $request) {        
        $res = $this->model::orderBy($this->orderField, $this->orderDirection);
        if($request->search) {     
            foreach($this->searchableFields as $field) {
                $res->orWhere($field, 'LIKE', '%'.$request->search.'%');               
            }            
        }        
        
        foreach($this->filteredFields as $field) {
            if($request->has($field)) {
                $res->where($field, '=', $request->$field);
            }
        }            
        
        return $res->paginate($this->perPage);        
    }

    public function create() {
        $class = $this->model;
        return new $class;
    }

    public function store(Request $request) {    
        $request->validate($this->validationRules);
        $class = $this->model;
        $model = new $class;
        $model->fill($request->all());
        $model->save();        
    }

    public function show($id) {                
        return $this->model::findOrFail($id);
    }

    public function update($id, Request $request) {
        $request->validate($this->validationRules);
        $model = $this->model::findOrFail($id);
        $model->fill($request->all());
        $model->save();
    }

    public function destroy($id) {          
        $model = $this->model::findOrFail($id);
        $model->delete();
    }
}
