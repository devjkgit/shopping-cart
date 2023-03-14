@extends('layouts.app')
@section('title',"All Products")
@section('bodyclass',"products_page")
@section('section')
<!----- Products ----->
<section class="all_products">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 col-12 text-center products_blog mb-5">
                <a href="{{ url('product/'.$product['id']) }}">
                    <div class="product_img w-100">
                        <img src="{{ $product['image'] }}" alt=""
                            class="w-100">
                    </div>
                    <p>{{ $product['title'] }}</p>
                </a>
                <a href="{{ url('add-to-cart/'.$product['id']) }}" class="add_to_cart"><span>Add To
                        Cart</span></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection