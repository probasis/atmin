<?php

namespace App\Http\Controllers\Resources;

class Categories extends \App\Http\Controllers\Controller
{    
   use \App\Atmin\CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Category::class;         
       $this->filteredFields = ['catalog_id', 'category_id'];
   }   
}
