@extends('layouts.app')
@section('bodyclass',"sign_in")
@section('section')
<!----- Shopping App ----->
<section class="shopping_app">
    <div class="container">
        <div class="row">
            <div class="shopping_app">
                <h2>Shopping App</h2>
            </div>
        </div>
    </div>
</section>

<!----- Sign In ----->
<section class="sign_in">
    <div class="container">
        <div class="row">
            <a href="/login">
                <button>
                    <span class="sign_in_btn">Sign In</span>
                    <span class="sign_in_btn_bg"></span>
                </button>
            </a>
        </div>
    </div>
</section>
@endsection