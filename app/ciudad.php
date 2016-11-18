<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
    protected $table='city';
    protected $fillable=['Name','Province','Country'];


    public static function ciudades($idE,$idP){
    	return ciudad::where('Country','=',$idP)->where('Province','=',$idE)->orderBy('Name', 'asc')->get();
    	//$estados=DB::table('province')->where('Country','=',$id)->get();
    	//return $estados;
    }
}
