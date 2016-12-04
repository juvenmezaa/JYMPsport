<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use App\productosModel;
use App\pedidosModel;
use App\categoriasModel;
use App\ciudad;
use App\estado;
use App\pais;
use Illuminate\Support\Facades\Auth;
use App\Tallas_ProductosModel;
class pedidosController extends Controller
{
    public function pedirProducto($id){
    	if (Auth::check()) {
    		$id_usuario=Auth::User()->id;
    		$user=DB::table("users")->find($id_usuario);
		    $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
		    $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
		    $producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id)->select("p.*","c.nombre as nombreCat","c.imagengen as generica")->get();
		    $tallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion","t.id")->get();
		    $Ntallas=DB::table("tallas_productos AS tp")->join("tallas AS t", "tp.id_talla","=","t.id")->join("productos AS p", "tp.id_producto","=","p.id")->where("p.id","=", $id)->select("tp.cantidad","t.talla","t.descripcion")->count();
            $paises=pais::pluck('Name','Code');
		    return  view ('pedido', compact('categoriasH','categoriasM','producto','tallas','user','paises'));
		}
        return Redirect('/login');
	}
    public function getEstados(Request $request, $id){
            if($request->ajax()){
            $estados=estado::estados($id);
            return response()->json($estados);
        }
    }
    public function getCiudades(Request $request, $idE, $idP ){
            if($request->ajax()){
            $ciudades=ciudad::ciudades($idE,$idP);
            return response()->json($ciudades);
        }
    }

	public function pedidosUser(){
        if (Auth::check()) {
            $id_usuario=Auth::User()->id;
            $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
            $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
            $pedidos=DB::table("pedidos AS p")->join("productos AS pr", "p.id_producto","=","pr.id")->join("tallas AS t", "p.id_talla","=","t.id")->join("categorias AS c", "pr.id_categoria","=","c.id")->where("p.id_usuario","=", $id_usuario)->select("p.fecha","pr.descripcion","t.talla","p.cantidad","p.precio_total","pr.imagen","c.nombre as nombreCat", "c.imagengen as generica")->paginate(5);


            return view('pedidosUser', compact('categoriasH','categoriasM','pedidos'));

        }
        return Redirect('/login');
    }

    public function pedidoEnviado(Request $request){
        $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
        $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
        $usuario    = $request->input('usuario_id');
        $id_producto= $request->input('id_producto');
        $id_talla   = $request->input('tallas');  
        $cantidad   = $request->input('cantidad');
        $fechaF     = getdate();
        $año        = $fechaF['year'];
        $mes        = $fechaF['mon'];
        $dia        = $fechaF['mday'];
        $fecha      = $año."-".$mes."-".$dia;
        $precio     = $request->input('precio');
        $cupon= $request->input('cupon');
        if($cupon=="BUENFIN"){
            $precio= $precio*0.75;
        }
        $precio_total = $cantidad*$precio;
        $pais       =   $request->input('pais');    
        $estado     =   $request->input('estado');
        $ciudad     =   $request->input('ciudad');
        $metodoEnvio    =   $request->input('envio');   
        $codigoPostal   =   $request->input('codigoPostal');
        $colonia        =   $request->input('colonia');
        $calle          =   $request->input('calle');
        $numExt         =   $request->input('numero_ext');
        $numInt         =   $request->input('numero_int');
        if($numInt==null){
            $numInt="-";
        }
        $tel            =   $request->input('tel');

        $pedido = new pedidosModel;
        $pedido->id_usuario     = $usuario;
        $pedido->id_producto    = $id_producto;
        $pedido->id_talla       = $id_talla;
        $pedido->cantidad       = $cantidad;
        $pedido->fecha          = $fecha;
        $pedido->precio_total   = $precio_total;
        $pedido->created_at     = $fecha;
        $pedido->updated_at     = $fecha;
        $pedido->pais           = $pais;
        $pedido->estado         = $estado;
        $pedido->ciudad         = $ciudad;
        $pedido->metodo_envio   = $metodoEnvio;
        $pedido->codigo_postal  = $codigoPostal;
        $pedido->colonia        = $colonia;
        $pedido->calle          = $calle;
        $pedido->num_ext        = $numExt;
        $pedido->num_int        = $numInt;
        $pedido->tel            = $tel;
        $pedido->save();
        
        $id_tallas_productos=DB::table('tallas_productos')->where('id_producto','=',$id_producto)->where('id_talla','=',$id_talla)->select('id')->get();
        $restarCantidad=Tallas_ProductosModel::find($id_tallas_productos[0]->id);
        $restarCantidad->cantidad=($restarCantidad->cantidad)-1;
        $restarCantidad->save();
        
        $producto=DB::table("productos AS p")->join("categorias AS c", "p.id_categoria","=","c.id")->where("p.id","=", $id_producto)->select("p.*","c.nombre as nombreCat","c.imagengen as generica")->get();
        $talla=DB::table("tallas")->find($id_talla);
        return view('pedidoEnviado', compact('precio_total','categoriasM','categoriasH','producto','talla','cantidad','precio','pedido'));
    
    }
    public function pdfPedidos(){
        $vista = view('/pdfPedidos');
        $dompdf = \App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();

    }
}
