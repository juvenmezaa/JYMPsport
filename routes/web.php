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
Route::get("/panel/categoriasproductos/all","categoriasproductosController@asignarACategoria");
Route::post("/panel/categoriasproductos/asignar","categoriasproductosController@asignar");
//////////////
Route::get("/panel/productosModel/edit","productosModelController@registrar");
Route::get("/panel/productosModel/edit?delete={id}","productosModelController@eliminar");
Route::post("/panel/productosModel/guardar","productosModelController@guardar");
//////////////
Route::get("/pedirProducto/{id}", "pedidosController@pedirProducto");
Route::get("/pedidosUser", "pedidosController@pedidosUser");
Auth::routes();
//Route::get("/")
Route::get("/productos/{g}", "principalController@productos"); 
Route::get("/productosCategoria/{g}/{c}", "principalController@productosCategoria");
Route::get("/home", "HomeController@index");
Route::post("/rating", "RatingController@rateJ");
Route::post("/comentar", "comentariosModelController@comentar");