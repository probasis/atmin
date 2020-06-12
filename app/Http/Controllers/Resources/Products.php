<?php

namespace App\Http\Controllers\Resources;

class Products extends \App\Http\Controllers\Controller
{    
   use \App\Atmin\CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Product::class;         
       $this->filteredFields = ['category_id'];
   }   
}
