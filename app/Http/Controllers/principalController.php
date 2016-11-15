<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\productosModel;
use App\categoriasModel;

class principalController extends Controller
{
    public function index(){
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
        $recientess1 =DB::table('productos')->latest()->limit(4)->get();
        $recientess2 =DB::table('productos')->offset(4)->latest()->limit(4)->get();
        $recientess3 =DB::table('productos')->offset(8)->latest()->limit(4)->get();
    	return view('principalUser', compact('productos','categoriasH','categoriasM','recientess1','recientess2','recientess3'));
    }
    public function productos($g){
        if($g == "hombres"){
            $genero = '1';
           // dd($genero);
        }else{
            $genero = '0';
        }
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
        $productos = DB::table('productos AS P')->where('genero','=',$genero)->get();
        return view('productos', compact('productos','categoriasH','categoriasM','breadcrumb'));
    }
    public function productosCategoria($c){
        $categoria = DB::table('categorias AS C')->where('nombre','=',$c)->get();
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
        $productos = DB::table('productos AS P')->where('id_categoria','=',$categoria[0]->id)->get();
        return view('productos', compact('productos','categoriasH','categoriasM'));
    }
    public function detalleProducto($id){
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
    	$producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id)->select("p.*","c.nombre as nombreCat")->get();
        $tallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->get();
        $comentarios=DB::table("comentarios AS c")->join("users AS u", "c.id_usuario","=","u.id")->where("c.id_producto","=", $id)->select("c.comentario","c.fecha","u.name")->paginate(5);
        $calificacion=DB::table("calificaciones AS c")->join("users AS u", "c.id_usuario","=","u.id")->where("c.id_producto","=", $id)->select("c.calificacion")->get();
    	return view('detalleProducto', compact('producto','tallas','comentarios','calificacion','categoriasH','categoriasM'));

    }

}
