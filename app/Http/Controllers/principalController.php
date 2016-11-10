<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\productosModel;

class principalController extends Controller
{
    public function index(){
    	return view('principalUser');
    }
    public function twitter(){
    	return redirect()->away("https://www.twitter.com/JJYMPstore");
    }
    public function facebook(){
    	return redirect()->away("https://www.facebook.com/JYMPstore");
    }
    public function instagram(){
    	return redirect()->away("https://www.instagram.com/JYMPstore");
    }
    public function productos($g){
        if($g == "hombres"){
            $genero = '1';
           // dd($genero);
        }else{
            $genero = '0';
        }
       
        //$productos = productosModel::paginate(8);
        $productos = DB::table('productos AS P')->where('genero','=',$genero)->get();
        return view('productos', compact('productos'));
    }
    public function detalleProducto($id){
    	$producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id)->select("p.*","c.nombre")->get();
        $tallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->get();
    	return view('detalleProducto', compact('producto','tallas'));
    }
}
