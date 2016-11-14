<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\RatingModel;
use DB;
class RatingController extends Controller
{
    public function rate(Request $request){
    	
    	if (Auth::check()) {
    // The user is logged in...
            $idUser = Auth::user()->id;
    		$id=$request->input('idprod');
            $cal=$request->input('calif');
      
        $existe=RatingModel::where('id_producto', '=', $id)->where('id_usuario', '=',$idUser)->exists();
        if(!$existe){
             $nuevo=new RatingModel;
            $nuevo->id_producto=$id;
            $nuevo->calificacion=$cal;
            $nuevo->id_usuario=$idUser;
               $nuevo->save();

               return back()->withInput();
        }
           
    		 
		}
		return Redirect('/login');
    }
    public function rateJ(Request $request){
        if (Auth::check()) {
        // The user is logged in...
            $idUser = Auth::user()->id;
            $id=$request->input('idprod');
            $cal=$request->input('rating');
      
            $existe=RatingModel::where('id_producto', '=', $id)->where('id_usuario', '=',$idUser)->exists();
            if(!$existe){
                $nuevo=new RatingModel;
                $nuevo->id_producto=$id;
                $nuevo->calificacion=$cal;
                $nuevo->id_usuario=$idUser;
                $nuevo->save();

                return back()->withInput();
            }
            return back()->withInput();
        }
        return Redirect('/login');
    }

}
