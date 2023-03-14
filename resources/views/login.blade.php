@extends('layouts.app')
@section('title',"Login")
@section('bodyclass',"login_in")
@section('section')
        <!----- Welcome Back ----->
        <section class="welcome_back">
            <div class="container">
                <div class="row">
                    <div class="welcome_back">
                        <h2>Welcome Back</h2>
                    </div>
                </div>
            </div>
        </section>

        <!----- log In ----->
        <section class="log_in">
            <div class="container">
                <div class="row">
                    <div class="login_form">
                        <form action="/login" method="post" >
                            @csrf
                            <div class="user_name">
                                <label for="username">User</label>
                                <input type="text" required="" name="username"
                                    placeholder="username">
                            </div>
                            <div class="password">
                                <label for="password">Password</label>
                                <input type="password" id="password" required="" name="password"
                                    placeholder="password">
                                <i class="fa-regular fa-eye toggle-password"></i>
                            </div>
                            <!-- <a href="products.html"> -->
                                <button>
                                    <span class="log_in_btn">Log In</span>
                                    <span class="log_in_btn_bg"></span>
                                </button>
                            <!-- </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('customscripts')
<script type="text/javascript">
    $("body").on('click', '.toggle-password', function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $("#password");
      if (input.attr("type") === "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
</script>
@endsection