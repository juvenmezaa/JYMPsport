<?php 

namespace App;

trait TallasProdTrait
{
	public function productos()
    {
    	//dd($this->belongsToMany('App\comentariosModel','id_usuario','id'));
    	//dd($this->hasMany('App\usersModel','id','id_usuario'));
        //return $this->hasMany('App\comentariosModel','id_usuario','id');
        //dd($this->belongsToMany('App\productosModel','categorias_productos','id_categoria','id_producto'));
        return $this->belongsToMany('App\productosModel','tallas_productos','id_talla','id_producto');
        //return $this->belongsToMany('App\Tallas_ProductosModel','productos','id','id_talla');
    }

    public function tallas(){
    	return $this->belongsToMany('App\Tallas','tallas_productos','id_talla','id');
    }
}