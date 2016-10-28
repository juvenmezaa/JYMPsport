<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class principalController extends Controller
{
    public function index(){
    	return view('principalUser');
    }
    public function twitter(){
    	return redirect()->away("https://www.twitter.com");
    }
    public function facebook(){
    	return redirect()->away("https://www.facebook.com");
    }
    public function instagram(){
    	return redirect()->away("https://www.instagram.com");
    }
}