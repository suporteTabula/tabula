@extends('layouts.user')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
    
@endsection


<body>
    <section class="navigation-bar">
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
    </section>
</body>