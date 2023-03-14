@extends('layouts.app')
@section("title","Cart")
@section('bodyclass','cart_page')
@section('section')
<!----- Cart ----->
<section class="cart_main">
    <div class="container">
        <div class="row">
            <div class="cart_enner">
                <div class="cart_heading">
                    <h2>Your Cart</h2>
                    <p>{{ count($cart_products) }} items</p>
                </div>
                @if(!empty($cart_products))
                <div class="cart_products">
                    @php $total = 0 @endphp
                    @foreach($cart_products as $key)
                    @php
                        $total += $key['product_details']['price']*$key['qty'];
                    @endphp
                    <div class="cart_product_blog">
                        <div class="cart_product_dtl">
                            <div class="cart_pro_img">
                                <img src="{{ $key['product_details']['image'] }}"
                                    alt="" class="w-100">
                            </div>
                            <p class="pro_name">{{ $key['product_details']['title'] }}</p>
                            <p class="pro_qty">Qty : {{ $key['qty'] }}</p>
                        </div>
                        <div class="cart_pro_details">
                            <p class="pro_price">${{ $key['product_details']['price'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="cart_total">
                    <div class="cart_total_price">
                        <p><span>Total</span>${{ $total }}</p>
                    </div>
                    <a href="/clear-cart"><i class="fa-solid
                            fa-cart-shopping"></i>
                        Clear Cart</a>
                </div>
                <div class="check_out w-100 text-center">
                    <a href="#" class="check_out_mn">Check Out</a>
                </div>
                @else
                    <div class="check_out w-100 text-center">
                        <a href="/products" class="check_out_mn">Shop</a>
                    </div>

                @endif
            </div>
        </div>
    </div>
</section>
@endsection