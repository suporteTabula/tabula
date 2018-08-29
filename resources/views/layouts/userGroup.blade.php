<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$company->name}}</title>
        <!-- Styles -->        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/home-empresa.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        @yield('styles')
    </head>
    <body class="bg-primary-{{$company->theme_color}}">
        <section class="navigation-bar bg-primary-white">
            <div class="container grid-md">
                <div class="columns">   
                    <div class="nav-brand column col-2 col-xs-6 col-sm-3">
                        <a href="{{ url('/') }}"><img src="{{ asset('images/layout/header/logo.svg') }}" height="30px"></a>
                    </div>
                    <div class="nav-search col-5 hide-xs col-sm-5">
                        <section class="navbar-section">
                            <div class="input-group input-inline">
                                <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                    <input class="button-tabula-{{$company->theme_color}}-inverted text-white;" name="search_string" type="text" placeholder="Digite sua busca.">
                                    <button class="button-tabula-{{$company->theme_color}}" type="submit">Buscar</button>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div class="nav-menu col-5 col-xs-6 col-sm-4 col-md-5">
                        <div class="menu-icon show-sm">
                            <div class="icon-open"></div>
                            <div class="icon-closed"></div>
                        </div>
                        <ul class="hide-sm">
                            @auth
                                <li><a class="text-{{$company->theme_color}}" href="{{ route('cart') }}">Cart</a></li>
                            @endauth
                            <li><a class="text-{{$company->theme_color}}" href="#">Canais</a></li>
                            <li><a class="text-{{$company->theme_color}}" href="#">Instituições</a></li>
                            @auth
                                <li><a class="text-{{$company->theme_color}}" href="{{ route('userPanel.single') }}">Painel</a></li>
                                <li><a class="text-{{$company->theme_color}}" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            @else
                                <li><a class="text-{{$company->theme_color}}" href="{{ route('register') }}">Cadastre-se</a></li>
                                <li><a class="text-{{$company->theme_color}}" href="{{ route('login') }}">Login</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
            <div class="offscreen-menu show-sm bg-primary-{{$company->theme_color}}">
                <div class="menu-mob">
                    <ul>
                        <li><a class="text-white" href="#">Canais</a></li>
                        <li><a class="text-white" href="#">Instituições</a></li>
                        @auth
                            <li><a class="text-white" href="{{ route('userPanel.single') }}">Painel</a></li>
                            <li><a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        @else
                            <div class="divider"></div>
                            <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                <input class="" name="search_string" type="text" placeholder="Digite sua busca.">
                                <button class="button-tabula" type="submit">Buscar</button>
                            </form>
                            <li><a class="button-tabula-{{$company->theme_color}}-inverted" href="{{ route('register') }}">Cadastre-se</a></li>
                            <li><a class="button-tabula-{{$company->theme_color}}-inverted" href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>                    
                </div>
            </div>
        </section>
        
        @yield('content')

        <footer class="bg-primary-white">
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
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif

            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}")
            @endif
        </script>

        @yield('scripts')
    </body>
</html>