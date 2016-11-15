<?php 

namespace App;

trait relacionUsers
{
	public function users()
    {
    	//dd($this->belongsToMany('App\comentariosModel','id_usuario','id'));
    	//dd($this->hasMany('App\usersModel','id','id_usuario'));
        //return $this->hasMany('App\comentariosModel','id_usuario','id');
        return $this->hasMany('App\usersModel','id','id_usuario');
    }
}