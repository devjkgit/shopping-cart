<!DOCTYPE html>
<html lang="en">

    <head>
        <title>@yield('title')</title>

        <!----- meta links ----->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!----- Font Family Link ----->
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">

        <!----- Latest compiled and minified CSS ----->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"
            />

        <!----- Font Awesome CSS ----->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            />

        <!----- Custom style sheet links ----->
        <link rel="stylesheet" href="/assets/css/style.css">

    </head>

    <body class="@yield('bodyclass')">
        @if(!(Request::is('/') || Request::is('login')))
        <!----- Header ----->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="header_enner">
                        <div class="site_name"><h2>Shopping App</h2></div>
                        <ul>
                            <li><a href="/products">Home</a></li>
                            <li><a href="#"><i class="fa-solid
                                        fa-magnifying-glass"></i></a></li>
                            <li><a href="/cart"><i class="fa-solid
                                        fa-cart-shopping"></i></a></li>
                            <li>
                                <div class="dropdown">
                                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                  </a>

                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                  </ul>
                                </div>                         
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        @endif

        <!-- Error Messages -->
        @if(Session::has('success'))
        <div class="alert alert-success">
        {{ Session::get('success') }}</div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger">
        {{ Session::get('error') }}</div>
        @endif

        <!-- For main content  -->
        @yield('section')
        <!-- For main content  -->

        <!-- jQuery library -->
        <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <!-- Popper JS -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js">
        </script>
        <!-- Latest compiled JavaScript -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js">
        </script>
        <!-- For custom js(jquery functions etc)  -->
        @yield('customscripts')
    </body>

</html>