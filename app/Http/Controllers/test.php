<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class test extends Controller
{
	public function index(){
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', 'http://fakestoreapi.com/products');
		$content = $response->getBody();
		$content = json_decode($response->getBody(), true);
		
		foreach ($content as $prod) {
		    \App\Models\Product::create(['name' => $prod['title'],'description'=>$prod['description'],'price'=>$prod['price'],'photo'=>$prod['image'],]);
		}
	}
}
