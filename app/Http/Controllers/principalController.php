<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\productosModel;
use DB;

class principalController extends Controller
{
    public function index(){
    	return view('principalUser');
    }
    public function productos(){
        /*$productos = productos::all();*/
        return view('productos'/*, compact('productos')*/);
    }
    public function detalleProducto($id){
    	$producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id)->select("p.*","c.nombre")->get();
        $tallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->get();
    	return view('detalleProducto', compact('producto','tallas'));
    }
}
