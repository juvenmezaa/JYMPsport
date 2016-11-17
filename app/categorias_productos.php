<?php 

namespace App;

trait categorias_productos
{
	public function productos()
    {
    	//dd($this->belongsToMany('App\comentariosModel','id_usuario','id'));
    	//dd($this->hasMany('App\usersModel','id','id_usuario'));
        //return $this->hasMany('App\comentariosModel','id_usuario','id');
        //dd($this->belongsToMany('App\productosModel','categorias_productos','id_categoria','id_producto'));
        return $this->hasMany('App\productosModel','id_categoria','id');
    }
}