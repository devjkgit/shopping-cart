@extends('layouts.app')
@section('title',$product['title'].' | Shopping App')
@section('bodyclass',"single_products_page")
@section('section')
<!----- Single Products ----->
<section class="single_products web_view">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center single_products_blog mb-5">
                <div class="row">
                    <div class="product_img w-50 d-inline-block">
                        <img src="{{ $product['image'] }}" alt=""
                            class="w-100">
                    </div>

                    <div class="product_details text-start w-50 pl-5
                        d-inline-block">
                        <h3>{{ $product['title'] }}</h3>
                        <p class="products_price">${{ $product['price'] }}</p>
                        <p class="pro_description">{{ $product['description'] }}</p>
                        <div class="products_quantity">
                            <label for="quantity">Quantity:</label>
                            <div class="number">
                                <span class="minus">-</span>
                                <input type="text" id="qty" name="qty" value="1"/>
                                <span class="plus">+</span>
                            </div>
                        </div>
                        <a href="#" class="add_to_cart"><span>Add To Cart</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customscripts')
<script>
$(document).ready(function() {
	$('.minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
    $('.add_to_cart').click(function(){
        var product = '{{ $product["id"] }}';
        var qty = $('#qty').val();
        window.location.href = "/add-to-cart/"+product+'/'+qty;
    });
});
</script>
@endsection