<?php

namespace App\Http\Controllers\Resources;

class Catalogs extends \App\Http\Controllers\Controller
{    
   use \App\Atmin\CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Catalog::class;              
   }   
}
