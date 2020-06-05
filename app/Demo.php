<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $guarded = ['id'];

    protected $attributes = array(
        'title'  => 'Default title',
        'text'   => 'Some text',
        'choice' => 'd',
    );   
}
