<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tallas_ProductosModel extends Model
{
    protected $table = 'tallas_productos';
    protected $fillable = ['id','id_talla','id_producto','cantidad'];
}
