<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {            
            $table->string('name');
            $table->text('value')->nullable();
            $table->timestamps();
            
            $table->primary('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
