<?php 

namespace App;

use DB;

trait TallasProdTrait
{
	public function tallas()
    {
    	//dd($this->belongsToMany('App\comentariosModel','id_usuario','id'));
    	//dd($this->hasMany('App\usersModel','id','id_usuario'));
        //return $this->hasMany('App\comentariosModel','id_usuario','id');
        //dd($this->belongsToMany('App\productosModel','categorias_productos','id_categoria','id_producto'));
        //return $this->belongsToMany('App\productosModel','tallas_productos','id_talla','id_producto');
        $bla = $this->hasMany('App\Tallas','id','id_talla','id_producto');
        //dd($bla->pluck("talla")->all());
        return $bla;
        //return $this->hasMany('App\Tallas','id','id_talla','id_producto');
        //return $this->belongsToMany('App\Tallas_ProductosModel','productos','id','id_talla');
    }

    public function productos(){
    	return $this->hasMany('App\productosModel','id','id_producto','id');
    }

    public function tallasProd(){
    	//return $this->performInsert(DB::table('tallas_productos')->insert(['id_producto' => 1,'id_talla' => 4,'cantidad' => 69]));
    	//$ble = $this->belongsToMany('App\Tallas_ProductosModel','productos','id','id');
    	$plis = $this->hasMany('App\Tallas_ProductosModel','id_producto');
    	//dd($plis);
    	return $plis;

    	//dd($ble->pluck("cantidad")->all());
    	//return $ble;
    	$si = $this->belongsToMany('App\Tallas','tallas_productos','id_producto','id_talla');
    	//dd($si->pluck("cantidad"));
    	return $si;
    	//return $this->belongsToMany('App\productosModel','tallas_productos','id_producto','id_talla');
    }

    // public function registrar($tallaProd){
    // 	//$query = DB::raw('insert into "tallas_productos" ("id_producto","id_talla","cantidad") values ()');
    // 	return Tallas_ProductosModel->id;
    // }
}