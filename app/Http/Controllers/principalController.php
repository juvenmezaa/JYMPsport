<?php

namespace App\Http\Controllers;

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
    public function productos($n){
        $productos = productosModel::paginate(8);
        return view('productos', compact('productos','genero'));
    }
    public function detalleProducto($id){
    	$producto=productos::find($id);
    	return view('detalleProducto', compact('producto'));
    }
}
