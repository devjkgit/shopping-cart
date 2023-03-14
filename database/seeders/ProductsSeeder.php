<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$client = new Client();
		$response = $client->request('GET', 'http://fakestoreapi.com/products');
		$content = $response->getBody();
		$content = json_decode($content, true);
		
		foreach ($content as $prod) {
		    \App\Models\Product::create(['name' => $prod['title'],'description'=>$prod['description'],'price'=>$prod['price'],'photo'=>$prod['image'],]);
		}
    }
}
