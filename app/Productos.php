<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model {

    protected $table = 'productos';

    protected $fillable = ['id','descripcion','precio','costo','cantidad','talla','color'];
}
