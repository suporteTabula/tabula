@extends('layouts.user')
@section('styles')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
<section>
        <div class="container grid-lg">
            <div class="columns">
                    <div class="column col-1"></div>
                    <div class="column col-10 checkout-courses">
                        <div class="columns">
                            <div class="column col-12 check-card">
                                <div class="columns">
                                    <div class="column col-xs-12 col-sm-2 col-md-3 col-lg-2 col-2 check-img">
                                        
                                    </div>
                                    <div class="column col-xs-12 col-sm-9 col-md-8 col-lg-9 col-9 check-name">
                                        <p>Nome dodsaddsaasdsa dsa dsa as asd dasd asd as asasd  as Curso</p>
                                        <p><b>R$ 30,00</b></p>
                                    </div>
                                    <div class="column col-xs-12 col-sm-1 col-md-1 col-lg-1 col-1 check-rem">
                                        <img src="images/cancel-music.svg" width="25px">
                                    </div>
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
                    <span>R$ 516,25</span>
                    <a href="#" class="button-tabula-gray">Finalizar Compra</a>
                </div>
                <div class="column col-1"></div>
            </div>
        </div>
    </section>
@endsection