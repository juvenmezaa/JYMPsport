<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productosModel extends Model
{
	use TallasProdTrait;
    protected $table = 'productos';

    protected $fillable = ['id','descripcion','precio','costo','color','imagen','genero','id_categoria'];
}
