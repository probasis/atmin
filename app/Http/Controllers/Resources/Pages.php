<?php

namespace App\Http\Controllers\Resources;

class Pages extends \App\Http\Controllers\Controller
{    
   use \App\Atmin\CrudTrait;
   
   public function __construct() {       
       $this->model = \App\Models\Page::class;         
       $this->filteredFields = ['page_id'];
       $this->orderField = 'sort';
   }   
}
