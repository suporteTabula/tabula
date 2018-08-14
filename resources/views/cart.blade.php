@extends('layouts.user')
@section('styles')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
    @if(count($courses) == 0)
        <br><br><br><br>
        <b>Não existem items no carrinho!</b><br>
        Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a>
    @else
    <section>
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-1"></div>
                    <div class="column col-10 checkout-courses">
                        <div class="columns">
                            <div class="column col-12 check-card">
                                <div class="columns">
                                        @foreach($courses as $course)
                                            <div class="column col-xs-12 col-sm-2 col-md-3 col-lg-2 col-2 check-img"></div>
                                            <div class="column col-xs-12 col-sm-9 col-md-8 col-lg-9 col-9 check-name">
                                                <p>{{ $course->name }}</p>
                                                <p><b>{{ $course->price }}</b></p>
                                                <a href="{{ route('cart.remove', ['id' => $course->cart_id]) }}">Remover</a>
                                            </div>
                                            <div class="column col-xs-12 col-sm-1 col-md-1 col-lg-1 col-1 check-rem">
                                                <img src="images/cancel-music.svg" width="25px">
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="column col-1"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 total-checkout">
                    <p><b>Valor Total</b></p>
                    <span>{{ $total_price }}</span>
                    <a <a href="{{ route('cart.checkout') }}" class="button-tabula-gray">Finalizar Compra</a>
                </div>
                <div class="column col-1"></div>
            </div>
        </div>
    </section>
    @endif
@endsection