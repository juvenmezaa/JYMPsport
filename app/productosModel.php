<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productosModel extends Model
{
    protected $table = "productos";

    protected $fillable = ['id','descripcion','precio','costo','cantidad','talla','color'];
}
