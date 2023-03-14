<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Redirect;

class ProductController extends Controller
{
	public function __construct(){
		if(session('username') == null){
			Redirect::to('/')->send();
		}
	}
	
    //Load all products page
    public function index(){
    	// dd(session()->all());
		$products = Product::get_prod_data();
    	return view('products',compact('products'));

    }

    //single product page
    public function get_product($product_id){
    	$product = Product::get_prod_data($product_id);
    	return view('single_product',compact('product'));
    }

    //cart page
    public function cart(){
    	$cart_products = [];
    	if(session('cart')){
    		foreach (session('cart') as $id => $details) {
    			$product = Product::get_prod_data($id);
    			$cart_products[] = array("product_details"=>$product,'qty'=>$details['qty']); 
    		}
    	}
    	return view('cart',compact('cart_products'));
    }

    //adding products to cart
    public function add_to_cart($product_id,$qty=1)
    {
    	$product = Product::get_prod_data($product_id);
        if(!$product) {
            return redirect()->back()->with('error', 'There is something wrong please try again later.');
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [$product_id => ["qty" => $qty]];

            session()->put('cart', $cart);

            return redirect('/products')->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$product_id])) {

        	if($qty != 1){
            	$cart[$product_id]['qty'] = $cart[$product_id]['qty'] + $qty;

        	}
        	else{
            	$cart[$product_id]['qty']++;
        	}

            session()->put('cart', $cart);

            return redirect('/products')->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$product_id] = [
            "qty" => $qty
        ];

        session()->put('cart', $cart);

        return redirect('/products')->with('success', 'Product added to cart successfully!');
    }

    public function clear_cart(){
    	session()->forget('cart');
    	return redirect('/products')->with('success','Cart has been cleared successfully.');
    }
}
