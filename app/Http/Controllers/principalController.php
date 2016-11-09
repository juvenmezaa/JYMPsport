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
    public function producto($id){
    	$producto=productosModel::find($id);
    	return view('producto', compact('producto'));
    }
}
