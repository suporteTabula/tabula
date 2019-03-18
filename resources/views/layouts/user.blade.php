<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tabula</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <!--
    <link rel="stylesheet" href="{{ asset('css/card-js.min.css') }}">
    <script src="{{ asset('js/card.js') }}"></script>
-->

<link rel="stylesheet" href="{{ asset('css/themes.css') }}">
    <!--
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
-->

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<link rel="stylesheet" href="{{ asset('css/pagamento.css') }}">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900"><link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> @yield('styles') </head>


<!--Verificar link adicionado
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
<body>
    <div class="wrapper">
        <section class="navigation-bar">
            <div class="container grid-md">
                <div class="columns">
                    <div class="nav-brand column col-2 col-xs-10 col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <span><a href="{{ url('/') }}"><img align="center" src="{{asset('/images/layout/header/logo.png')}}" height="30px"> </a></span>  
                    </div>
                    <div class="nav-search column col-5 col-md-4 col-lg-5 col-xl-5 hide-xs hide-sm">
                        <section class="navbar-section search-bar">
                            <div class="input-group input-inline">
                                <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                    <input class="button-tabula-white" name="search_string" type="text" placeholder="O que você quer aprender hoje?">
                                    <button class="button-tabula-gray" type="submit">Buscar</button>
                                </form>
                            </div>
                        </section>
                    </div>
                    <div class="nav-menu column col-5 col-xs-2 col-sm-6 col-md-5 col-lg-5 col-xl-5">
                        <ul>  
                            <li>
                                <div class="menu-icon show-md">
                                    <div class="icon-open"></div>
                                    <div class="icon-closed"></div>
                                </div>
                            </li>    
                            @auth
                            @foreach ($auth->userTypes as $userType)
                            <?php $tipo = $userType->desc; ?>
                            @endforeach
                            @if($tipo == "Aluno")
                            <li class ="hide-md"><a href="{{ route('userPanel.single') }}"><img class="avatar" src="{{asset('/images/Profilepic')}}/{{ $auth->avatar }}"></a></li>
                            <li class="hide-md"><a href="{{route('beTeacher')}}">Torne-se professor</a></li> 
                            <li class="hide-md"><a href="{{ route('cart') }}">Carrinho</a></li>
                            <li class= "hide-md"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
                            @else
                            <li class ="hide-md"><a href="{{ route('userPanel.single') }}"><img class="avatar" src="{{asset('/images/Profilepic')}}/{{ Auth::user()->avatar }}"></a></li>
                            <li class="hide-md"><a href="{{ route('cart') }}">Carrinho</a></li>
                            <li class= "hide-md"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
                            @endif
                            @else
                            <li class="hide-md"><a href="{{route('beTeacher')}}">Torne-se professor</a></li> 
                            <li class="hide-md btn-menu-login"><a href="{{ route('login') }}">Login</a></li>
                            <li class="hide-md btn-menu-register"><a href="{{ route('register') }}">Cadastre-se</a></li>
                            @endauth  
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
                                    <li><a href="{{ route('cart') }}">Carrinho</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                    @else
                                    <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                        <input style="border: 1px solid white" class="button-tabula-white" name="search_string" type="text" placeholder="Digite sua busca.">
                                        <button  class="button-tabula-white" type="submit">Buscar</button>
                                    </form>
                                    <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Perfil</a></li>

                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        @yield('content')

    </div>
    
    <footer>
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-4 col-xl-4 col-md-4 col-sm-12 col-xs-12">
                    <ul>
                        <li><b>O Tabula</b></li>
                        <li><a href="#">Institucional</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="{{route('empresa.register')}}">Tabula para Empresas</a></li>
                    </ul>
                </div>
                <div class="column col-5 col-xl-5 col-md-5 col-sm-12 col-xs-12">
                    <ul>
                        <li><b>Suporte</b></li>
                        <li><a href="#">Central de Ajuda</a></li>
                        <li><a href="#">Perguntas Frequentes</a></li>
                        <li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Política de Propriedade Intelectual</a></li>
                    </ul>
                </div>
                <div class="column col-3 col-xl-3 col-md-3 col-sm-12 col-xs-12">
                    <ul>
                        <li><b>Comunidade</b></li>
                        <li><a href="#">Parceiros</a></li>
                        <li><a href="{{route('empresa')}}">Empresas</a></li>
                        <li><a href="{{route('todosProfs')}}">Professores</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5c8ba67f101df77a8be2c191/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->    





    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        @if (Session::has('success')) toastr.success("{{ Session::get('success') }}") @endif
        @if (Session::has('info')) toastr.info("{{ Session::get('info') }}") @endif
    </script> @yield('scripts') 
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>

</html>