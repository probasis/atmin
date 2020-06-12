<?php

namespace App\Http\Controllers\Resources;

class Reviews extends \App\Http\Controllers\Controller
{    
   use \App\Atmin\CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Review::class;         
       $this->filteredFields = ['product_id'];
   }   
}
