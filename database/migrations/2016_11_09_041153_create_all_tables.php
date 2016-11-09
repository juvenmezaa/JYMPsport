<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->double('precio');
            $table->double('costo');
            $table->bigInteger('visitas');
            $table->string('color',20);
            $table->timestamps();
        });
        Schema::create('tallas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('talla',10);
            $table->string('descripcion',35);
            $table->timestamps();
        });
        Schema::create('tallas_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto')->unsigned();
            $table->integer('id_talla')->unsigned();
            $table->integer('cantidad');
            $table->timestamps();
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_talla')->references('id')->on('tallas');
        });
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('descripcion',350);
            $table->timestamps();
        });
        Schema::create('categoriasa_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->timestamps();
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('calificacion');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->date('fecha');
            $table->string('comentario',500);
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
        Schema::create('moderar_comentario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_comentario')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->date('fecha');
            $table->timestamps();
            $table->foreign('id_comentario')->references('id')->on('comentarios');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->date('fecha');
            $table->double('subtotal');
            $table->double('impuesto');
            $table->double('precio_total');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
        Schema::create('detalles_compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_compra')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->double('precio_total');
            $table->timestamps();
            $table->foreign('id_compra')->references('id')->on('compras');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->date('fecha');
            $table->double('subtotal');
            $table->double('impuesto');
            $table->double('precio_total');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
        Schema::create('detalles_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pedido')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->double('precio_total');
            $table->timestamps();
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
        Schema::create('carrito', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->date('fecha_agregado');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
        Schema::drop('tallas');
        Schema::drop('tallas_productos');
        Schema::drop('compras');
        Schema::drop('detalles_compras');
        Schema::drop('pedidos');
        Schema::drop('detalles_pedidos');
        Schema::drop('categorias');
        Schema::drop('categorias_productos');
        Schema::drop('calificaciones');
        Schema::drop('comentarios');
        Schema::drop('moderar_comentario');
        Schema::drop('carrito');
    }
}
