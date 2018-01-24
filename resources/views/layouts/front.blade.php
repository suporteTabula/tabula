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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/slick-1.8.0/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick-1.8.0/slick/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        @yield('styles')
    </head>
    <body>
        <section class="navigation-wrapper">
            <div class="menu-icon"></div>
            <div class="logo-icon"></div>
            <div class="loupe-icon"></div>
            <div class="search-mob">
                <input class="tabula-input" type="text" placeholder="Faça sua busca">
                <button class="tabula-button"><a href="{{ route('search.single') }}">Buscar</a></button>
            </div>
            <div class="search-desktop">
                <input class="tabula-input-inverted" placeholder="Faça sua busca" type="text">
                <button class="tabula-button-inverted"><a href="{{ route('search.single') }}">Buscar</a></button>
            </div>
            <div class="menu-links-desktop">
                <ul>
                    <li><a class="sta-link" href="#">Canais</a></li>
                    <li><a class="sta-link" href="#">Instituições</a></li>
                    @auth
                        <li><a class="tabula-button" href="{{ route('userPanel.single') }}">Painel</a></li>
                        <li><a class="tabula-button" href="{{ url('/admin/home') }}">Administração</a></li>
                        <li><a class="tabula-button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    @else
                        <li><a class="tabula-button" href="{{ route('register') }}">Cadastre-se</a></li>
                        <li><a class="tabula-button" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
            <div class="menu-links-mobile">
                <ul>
                    @auth
                        <li><a href="{{ route('userPanel.single') }}">Painel</a></li>
                    @endauth
                    <li><a href="#">Canais</a></li>
                    <li><a href="#">Instituições</a></li>
                    <li><a href="#">Cadastre-se</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
        </section>
        
        @yield('content')

        <footer>
            <ul>
                <li><a href="#">Canais</a></li>
                <li><a href="#">Instituições</a></li>
                @auth
                    <li><a href="{{ route('userPanel.single') }}">Painel</a></li>
                    <li><a href="{{ url('/admin/home') }}">Administração</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                @else
                    <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endauth
                <li><a href="#">Suporte</a></li>
            </ul>
            <ul class="social-media">
                <li><a href="#"><img src="images/facebook-logo.svg" alt="facebook" style="width: 25px;"></a></li>
                <li><a href="#"><img src="images/instagram-logo.svg" alt="instagram" style="width: 25px;"></a></li>
                <li><a href="#"><img src="images/youtube-logo.svg" alt="youtube" style="width: 25px;"></a></li>
            </ul>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>
        <script src="{{ asset('css/slick-1.8.0/slick/slick.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
