<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class estado extends Model
{
    protected $table='province';
    protected $fillable=['Name','Country'];


    public static function estados($id){
    	return estado::where('Country','=', $id)->orderBy('Name', 'asc')->get();
    	//$estados=DB::table('province')->where('Country','=',$id)->get();
    	//return $estados;
    }

}
