<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Redirect;

class LoginController extends Controller
{
	//to check user is logged in or not - and if so then redirected to products page
	public function __construct(){
		if(session('username') != null){
			Redirect::to('/products')->send();
		}
	}

    //make user login
    public function login(Request $request){
    	if($request->isMethod('post')){
	    	session(['username'=>$request->username]);
	    	return redirect('/products');
    	}
    	return view('/login');
    }

    //user signin page
    public function signin(Request $request){
    	return view('/signin');
    }

    //user logout
    public function logout(){
    	session()->forget('username');
    	session()->forget('cart');
    	return redirect('/');
    }
}
