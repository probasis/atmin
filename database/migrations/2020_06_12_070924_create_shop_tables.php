<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTables extends Migration
{
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamps();            
        });
        
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalog_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->integer('sort');
            $table->text('description');
            $table->timestamps();      
            
            $table->foreign('catalog_id')->references('id')->on('catalogs');
            $table->foreign('category_id')->references('id')->on('categories');
        });          
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');                                    
            $table->string('title');
            $table->decimal('price');
            $table->integer('quantity');
            $table->text('description');
            $table->string('photo');
            $table->timestamps();   
            
            $table->foreign('category_id')->references('id')->on('categories');
        });               
        
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');                                    
            $table->dateTime('time');
            $table->string('author');
            $table->text('text');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');            
        });         
        
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');                                    
            $table->integer('sort');
            $table->string('title');
            $table->string('photo');            
            $table->timestamps();           
            
            $table->foreign('product_id')->references('id')->on('products');            
        });      
        
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->integer('sort');
            $table->enum('status', ['active','hidden','disabled'])->default('active');
            $table->string('title');
            $table->text('html');            
            $table->timestamps();    
            
            $table->foreign('page_id')->references('id')->on('pages'); 
        });          
    }

    public function down()
    {
        Schema::dropIfExists('catalogs');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('pages');        
    }
}
