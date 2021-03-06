<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tabula</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="stylesheet" href="{{ asset('css/card-js.min.css') }}">                                                                        
    
    <script src="{{ asset('js/card.js') }}"></script>
   
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/pagamento.css') }}">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> @yield('styles') </head>

<body>
    <section class="navigation-bar">
        <div class="container grid-md">
            <div class="columns">
                <div class="nav-brand column col-2 col-xs-10 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <div class="dropdown">
                    <span><a href="{{ url('/') }}"><img align="center" src="{{ asset('images/layout/header/logo.png') }}" height="30px"> </a></span>
                    <div class="dropdown-content">
                    <a href="/home1"> <img src="../images/layout/header/sp.jpg" height="25px"></a>
                    </div>
                    </div>
                </div>
                <div class="nav-search col-6 col-md-4 col-lg-5 col-xl-6 hide-xs hide-sm">
                    <section class="navbar-section">
                        <div class="input-group input-inline">
                            <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                <input class="button-tabula-white" name="search_string" type="text" placeholder="Digite sua busca.">
                                <button class="button-tabula-gray" type="submit">Buscar</button>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="nav-menu col-4 col-xs-2 col-sm-6 col-md-5 col-lg-4 col-xl-4">
                    <a href="#">
                        <img class="avatar" src="../images/avatar-1.png">
                    </a>
                    <ul class="show-sm">
                        <li> 
                            <div class="menu-icon">
                                <div class="icon-open"></div>
                                <div class="icon-closed"></div>
                            </div>
                        </li>
                        @auth
                        
                        @else
                        
                        @endauth 
                    </ul>
                    <ul class="hide-sm">
                        <li><a href="#">Hello1</a></li>
                        <li><a href="#">Hello2</a></li>
                        <li><a href="#">Hello3</a></li>
                        <li><a href="#">Hello4</a></li>
                    </ul>
                    
                </div>
            </div>
            <section style="width: 100%;">
                <div class="container grid-md" style="position: relative">
                    <div class="offscreen-menu">
                        <div class="menu-mob">
                            <ul> 
                                @auth
                                <li><a href="{{ route('userPanel.single') }}">Painel</a></li>
                                <li><a href="{{ route('cart') }}">Cart</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form> @else
                                <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                    <input style="border: 1px solid white" class="button-tabula-white" name="search_string" type="text" placeholder="Digite sua busca.">
                                    <button style="background-color: white; color: #303030" class="button-tabula-white" type="submit">Buscar</button>
                                </form>
                                <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Perfil</a></li>
                                <li><a href="{{ route('register') }}">Carrinho</a></li>
                                <li><a href="{{ route('register') }}">Cursos</a></li>
                                <li><a href="{{ route('register') }}">Compras</a></li>
                                <li><a href="{{ route('register') }}">Cursos Lecionados</a></li>
                                <li><a href="{{ route('register') }}">Logout</a></li> 
                                 @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    
    
    @yield('content')
    <footer>
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-4"></div>
                <div class="column col-4"></div>
                <div class="column col-4"></div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
   
    

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        if (Session::has('success')) toastr.success("{{ Session::get('success') }}")@ endif@
        if (Session::has('info')) toastr.info("{{ Session::get('info') }}")@ endif
    </script> @yield('scripts') 
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </body>

</html>