<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeTables extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('title');
            $table->text('text');
            $table->timestamps();
        });
        
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->date('date');
            $table->string('author');
            $table->text('text');            
            $table->timestamps();
        });        
        
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });                
        
        Schema::create('cms_sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });                        
    }

    public function down()
    {
        Schema::dropIfExists('blog_comments');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('cms_sections');
        Schema::dropIfExists('cms_pages');
    }
}
