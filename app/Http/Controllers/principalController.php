<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Productos;
use App\productosModel;

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
    	$producto=productos::find($id);
    	return view('detalleProducto', compact('producto'));
    }
}
