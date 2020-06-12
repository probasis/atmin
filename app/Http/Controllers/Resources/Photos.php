<?php

namespace App\Http\Controllers\Resources;

class Photos extends \App\Http\Controllers\Controller
{    
   use \App\Atmin\CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Photo::class;         
       $this->filteredFields = ['product_id'];
   }   
}
