@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
@if(count($courses) == 0)
<br><br><br><br>
<div class="no-items">
    <p><b>Não existem itens no carrinho!</b><br>
        Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a></p>
    </div>
    @else

    <!-- <section>
        <div class="container grid-md">
            <div class="columns">
            @foreach($courses as $course)
                <div class="column col-12 course-row">
                    <div class="course-image">
                        <img src="../images/avatar-1.png" alt="image do curso">
                    </div>
                    <div class="course-description">
                        <p>{{ $course->name }}</p>
                        <p><b>R$ {{ $course->price }}</b></p>
                    </div>
                    <div class="remove-icon">
                        <a href="{{ route('cart.remove', ['id' => $course->cart_id]) }}">
                            <img src="images/cancel-music.svg" width="25px">
                        </a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section> -->

    <!-- <section id="checkout">
        <div class="container grid-md">
            <div class="columns">
                <div class="column total-checkout">
                    <p><b>Valor Total</b></p>
                    <span>R$ {{ $total_price }}</span>
                    <a id="checkout-button" href="{{ route('cart.checkout') }}" class="button-tabula-gray">Finalizar Compra</a>
                </div>
            </div>
        </div>
    </section> -->

    <section>
        <div class="container grid-lg">
            <div class="column checkout-courses">
                <div class="columns">                                                          
                    <div class="column col-8 check-card">                    
                        @foreach(array_chunk($courses,2) as $chunks)
                        <div class="columns">
                            @foreach($chunks as $course)
                            <div class="column col-6 two">
                                <div class="columns course-cart-item">
                                    <div class="column col-4 check-img"></div>  
                                    <div class="column col-5 three">
                                        <p class="course-cart-title">{{ $course->name }}</p><br/>
                                        <p>{{ $course->desc }}</p><br/>
                                        <p>{{ $course->price }}</p>                                                
                                    </div>
                                    <div class="column col-1"></div>           
                                    <div class="column col-2 course-target-remove-container">
                                        <a href="{{ route('cart.remove', ['id' => $course->cart_id]) }}" class="course-cart-remove">X</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach                        
                    </div>
                    <div class="column col-4 check-card"><!-- Master Column Right -->
                        <div class="column col-12 total-checkout">
                            <p class="checkout-title">Valor Total</p>
                            <span>R${{ $total_price }}</span>
                            <a href="{{ route('cart.checkout') }}" class="button-tabula-gray">Finalizar Compra</a>

                            <a href="{{ route('search.single', ['id' => -1]) }}" class="button-tabula-gray">Continuar</a>
                        </div>

                    </div>
                </div>
                <div class="column col-1"></div>            
            </div>
        </div>
    </section> 
    <section>
        <div class="container grid-md">
            <div class="columns">

            </div>
        </div>
    </section>

    @endif
    @endsection