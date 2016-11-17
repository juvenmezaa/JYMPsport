<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use App\productosModel;
use App\categoriasModel;
use Illuminate\Support\Facades\Auth;

//use Alert;
class pedidosController extends Controller
{
    public function pedirProducto($id){
    	if (Auth::check()) {
    		$id_usuario=Auth::User()->id;
    		$user=DB::table("users")->find($id_usuario);
		    $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
		    $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
		    $producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id)->select("p.*","c.nombre as nombreCat","c.imagengen as generica")->get();
		    $tallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->get();
		    $Ntallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->count();
		    if($Ntallas ==0)
		    	 /*alert()->error('El Pokémon que busca no fue encontrado, intenta con otro nombre...')->persistent('OK');*/
        		return back()->withInput();
		    
		    $paises=DB::table("country")->get();
		    return  view ('pedido', compact('categoriasH','categoriasM','producto','tallas','user','paises'));


		    return  view ('pedido', compact('categoriasH','categoriasM','producto','tallas','user'));
		}
        return Redirect('/login');
	}

	public function pedidosUser(){
        if (Auth::check()) {
            $id_usuario=Auth::User()->id;
            $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
            $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
            $pedidos=DB::table("pedidos AS p")->join("productos AS pr", "p.id_producto","=","pr.id")->join("tallas_productos AS tp", "pr.id","=","tp.id_producto")->join("tallas AS t", "tp.id_talla","=","t.id")->where("p.id_usuario","=", $id_usuario)->select("p.fecha","pr.descripcion","t.talla","p.cantidad","p.subtotal","p.impuesto","p.precio_total")->paginate(5);
            return view('pedidosUser', compact('categoriasH','categoriasM','pedidos'));

        }
        return Redirect('/login');
    }
}
