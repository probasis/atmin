<?php

namespace App\Http\Controllers;

class CommentsResource extends Controller
{    
   use CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Comment::class;       
       $this->perPage = 1000;
       $this->filteredFields = ['post_id'];
   }   
}
