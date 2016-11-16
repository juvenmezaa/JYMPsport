<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoriasModel;
use App\categoriasproductos;
use App\productosModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class categoriasproductosController extends Controller
{

    public function asignarACategoria2(Request $request){
		$id = $request->input('option');
		dd($id);
		$productosG = DB::table('categorias_productos AS CP')->join('productos AS P','P.id','CP.id_producto')->where('id_categoria','<>',$id)->get;
		$productos = $productosG->lists('descripcion','id');
		$categorias = categoriasModel::all();
		return view("asignarProdACat", compact('categorias','productos'));
	}

	public function asignar(Request $request){
		//dd($request);
		$id_producto = $request->input('producto');
		$id_categoria = $request->input('categoria');
		$where = array();
		$where[0] = 'id_producto = $id_producto';
		$consulta = DB::table('categorias_productos')->where('id_producto','=',$id_producto,'and','id_categoria','=',$id_categoria)->get();
		//dd($consulta);
		$nuevo = new categoriasproductos;
		$nuevo->id_categoria = $id_categoria;
		$nuevo->id_producto = $id_producto;
		$nuevo->save();
		//dd(123);
		$productos = productosModel::all();
		$categorias = categoriasModel::all();
		//return view("asignarProdACat", compact('categorias','productos'));
		return Redirect('/panel/categoriasproductos/all');
	}

	public function asignarACategoria(){
		// $productosG = DB::table('productos')->where('genero','=',$genero)->get();
		// $productos = $productosG->lists('descripcion','id');

		// $categoriasG = DB::table('categorias AS C')->join('categorias_productos AS CP','C.id','=','CP.id_categoria')->join('productos AS P','P.id','=','CP.id_producto')->where('P.genero','=',$genero)->get();
		// $categoriasG = categoriasModel::find($id)->nombre;

		// $categorias = $cateogirasG->lists('nombre','id');
		$productos = productosModel::all();
		$categorias = categoriasModel::all();
		return view("asignarProdACat", compact('categorias','productos'));
	}
}
