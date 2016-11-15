<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriasModel extends Model {
	use categorias_productos;
    protected $table = 'categorias';

}
