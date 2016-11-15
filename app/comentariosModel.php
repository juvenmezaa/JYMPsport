<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentariosModel extends Model {
	use relacionUsers;
    protected $table = 'comentarios';

    //protected $fillable = ['id','id_usuario','id_producto','fecha','comentario'];

    //public function users()
    //{
    //	return $this->belongsToMany(Role::class);
    //}

}
