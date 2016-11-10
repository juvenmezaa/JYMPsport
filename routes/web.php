<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get("/", "principalController@index");
Route::get("/detalleProducto/{id}", "principalController@detalleProducto");

Auth::routes();
//Route::get("/")
Route::get("/productos/{g}", "principalController@productos"); 
Route::get("/productosCategoria/{c}", "principalController@productosCategoria");
Route::get("/home", "HomeController@index");
