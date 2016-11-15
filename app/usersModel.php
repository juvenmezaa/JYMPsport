<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersModel extends Model {

    protected $table = 'users';

    public function comentarios()
    {
    	return $this->hasMany(comentariosModel::class,'id_usuario', 'id');
    }
}