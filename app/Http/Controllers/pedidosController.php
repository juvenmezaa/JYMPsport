<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use App\productosModel;
use App\categoriasModel;

class pedidosController extends Controller
{
    public function pedirProducto($id){
    $categoriasH = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '1')->select('nombre')->distinct()->get();
    $categoriasM = DB::table('categorias AS C')->join('productos AS P', 'C.id','=','P.id_categoria')->where('genero','=', '0')->select('nombre')->distinct()->get();
    
    return  view ('pedido', compact('categoriasH','categoriasM'));
	}
}
