<?php

namespace App\Http\Controllers;

class DemoResource extends Controller
{    
   use CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Demo::class;       
   }   
}
