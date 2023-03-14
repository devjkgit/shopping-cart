<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Product extends Model
{
    use HasFactory;

     protected $fillable = ['name','description','photo','price'];

     public function get_prod_data($product_id = null){
     	$client = new Client();
		$response = $client->request('GET', 'http://fakestoreapi.com/products/'.$product_id);
		$statuscode = $response->getStatusCode();
		$content = $response->getBody();
		$productdata = json_decode($content, true);
		return $productdata;
     }
}
