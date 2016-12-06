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
Route::get("/panel/productosModel/edit","productosModelController@gestionar");
Route::get("/panel/productosModel/edit/{accion}","productosModelController@eliminar");
Route::post("/panel/productosModel/guardar","productosModelController@guardar");
Route::post("/panel/productosModel/actualizar","productosModelController@actualizar");
//////////////
Route::get("/pedirProducto/{id}", "pedidosController@pedirProducto");
Route::get("/pedidosUser", "pedidosController@pedidosUser");
Route::get("/eliminarPedido/{id}", "pedidosController@eliminarPedido");
Route::post("/pedidoEnviado","pedidosController@pedidoEnviado");

Route::get("/compraPDF/{id}","pedidosController@compraPDF");
Route::get("/compra", "pedidosController@compra");
Route::post("/compraEnviada","pedidosController@compraEnviada");
Route::get("/comprasUser","pedidosController@comprasUser");
Auth::routes();
//Route::get("/")
Route::get("/productos/{g}", "principalController@productos"); 
Route::get("/productosCategoria/{g}/{c}", "principalController@productosCategoria");
Route::get("/home", "HomeController@index");
Route::post("/rating", "RatingController@rateJ");
Route::post("/comentar", "comentariosModelController@comentar");
//selects dinamicos
Route::get("estados/{id}","pedidosController@getEstados");
Route::get("ciudades/{idE}/{idP}","pedidosController@getCiudades");