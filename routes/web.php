<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get ('/simple-form', 'SimpleForm@index');
Route::post('/simple-form', 'SimpleForm@post');

Route::get ('/ajax-form', 'AjaxForm@index');
Route::get ('/ajax-form/values', 'AjaxForm@values');
Route::post('/ajax-form', 'AjaxForm@post');

Route::get  ('/settings-form',      'SettingsForm@index');
Route::get  ('/resources/settings', 'SettingsResource@index');
Route::patch('/resources/settings', 'SettingsResource@update');

Route::get('/table', 'Table@index');
Route::get('/crud-table', 'CrudTable@index');
Route::get('/tree', 'Tree@index');

Route::resource('/resources/demo', 'DemoResource')->only(['index','show','create','store','update','destroy']);
Route::resource('/resources/posts', 'PostsResource')->only(['index','show','create','store','update','destroy']);
Route::resource('/resources/comments', 'CommentsResource')->only(['index','show','create','store','update','destroy']);



