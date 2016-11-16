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
        
        $promedios=DB::table("calificaciones AS c")->groupBy('id_producto')->select('id_producto')->orderBy(DB::raw('AVG(calificacion)'), 'desc')->limit(9)->get();
        $prom;
        foreach ($promedios as $p) {
            $prom[]=$p->id_producto;
        }
        $destacados=DB::table('productos as p')->join('categorias as C', 'C.id','=','P.id_categoria')->select('p.*','C.imagengen as generica')->whereIn('p.id',$prom)->get();

        //select `p`.*, AVG(calificacion) as promedio from `calificaciones` as `c` inner join `productos` as `p` on `c`.`id_producto` = `P`.`id` group by `c`.`id_producto` limit 9

        //select * from productos as p inner JOIN calificaciones as c on p.id = c.id_producto group by p.id order by AVG(calificacion) DESC limit 9

        $recientess1 =DB::table('productos as P')->join('categorias as C', 'C.id','=','P.id_categoria')->select('p.*','C.imagengen as generica')->latest()->limit(4)->get();
        $recientess2 =DB::table('productos as P')->join('categorias as C', 'C.id','=','P.id_categoria')->select('p.*','C.imagengen as generica')->offset(4)->latest()->limit(4)->get();
        $recientess3 =DB::table('productos as P')->join('categorias as C', 'C.id','=','P.id_categoria')->select('p.*','C.imagengen as generica')->offset(8)->latest()->limit(4)->get();
        return view('principalUser', compact('productos','categoriasH','categoriasM','destacados','recientess1','recientess2','recientess3'));
    }

    public function productos($g){
        $breadcrumb[]=$g;
        if($g == "hombres"){
            $genero = '1';
           // dd($genero);
        }else{
            $genero = '0';
        }
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
         $productos = DB::table('productos as P')->join('categorias as C', 'C.id','=','P.id_categoria')->select('p.*','C.imagengen as generica')->where('genero','=',$genero)->paginate(4);
       return view('productos', compact('breadcrumb','productos','categoriasH','categoriasM'));
    }

    public function productosCategoria($g,$c){
        $breadcrumb[]=$g;
        $breadcrumb[]=$c;
        if($g == "hombres"){
            $genero = '1';
           // dd($genero);
        }else{
            $genero = '0';
        }
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
        $categoria = DB::table('categorias AS C')->where('nombre','=',$c)->get();
        $productos = DB::table('productos as P')->join('categorias as C', 'C.id','=','P.id_categoria')->select('p.*','C.imagengen as generica')->where('id_categoria','=',$categoria[0]->id)->paginate(4);
        return view('productos', compact('breadcrumb','productos','categoriasH','categoriasM'));
    }

    public function detalleProducto($id){
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
    	$producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id)->select("p.*","c.nombre as nombreCat","c.imagengen as generica")->get();
        $tallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->get();
        $comentarios=DB::table("comentarios AS c")->join("users AS u", "c.id_usuario","=","u.id")->where("c.id_producto","=", $id)->select("c.comentario","c.fecha","u.name")->paginate(5);
        $calificacion=DB::table("calificaciones AS c")->join("users AS u", "c.id_usuario","=","u.id")->where("c.id_producto","=", $id)->select("c.calificacion")->get();
    	return view('detalleProducto', compact('producto','tallas','comentarios','calificacion','categoriasH','categoriasM'));

    }

}
