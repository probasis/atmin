<?php

namespace App\Http\Controllers;

class PostsResource extends Controller
{    
   use CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Post::class;       
       $this->perPage = 1000;
   }   
}
