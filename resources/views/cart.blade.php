@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
    <section class="wrapper-container">
        @if(count($courses) == 0)
        <div class="container grid">

            <div class="columns">                                                          
                <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 check-card"> 
                    <div class="no-items">
                        <p>
                            <b>Não existem itens no carrinho!</b><br>
                            Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @else

        <div class="container grid">
            <div class="column">
                <div class="columns">                                                          
                    <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 check-card">                    
                        @foreach(array_chunk($courses,2) as $chunks)
                        <div class="columns">
                            @foreach($chunks as $course)
                            <div class="column col-xs-12 col-sm-12 col-6 col-lg-6 col-xl-6 two">
                                <div class="columns course-cart-item">
                                    <div class="column col-4 check-img"></div>  
                                    <div class="column col-5 three">
                                        <p class="course-cart-title">{{ $course->name }}</p><br/>
                                        <p>{{ $course->desc }}</p><br/>
                                        <p>R$ {{ $course->price }}</p>                                                
                                    </div>
                                    <div class="column col-1"></div>           
                                    <div class="column col-2 course-target-remove-container remove-curso">
                                        <a href="{{ route('cart.remove', ['id' => $course->cart_id]) }}" class="course-cart-remove">X</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach                        
                    </div>
                    <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-5 check-card"><!-- Master Column Right  action="{{route('cart.cupom')}}-->
                        <div class="column col-12 total-checkout">
                            <p class="checkout-title">SubTotal</p>
                            <span >R${{ number_format($total_price, 2,',', '.') }}</span>

                                <div class="my-1">
                                    <label class="sr-only" for="codCupom">Cupom</label>
                                    <input type="text" class="form-control " name="codCupom" id="codCupom" placeholder="Informar Cupom">
                                    <button class="button-tabula-gray" id="cupom">Validar</button>
                                </div>
                            <p class="checkout-title">Total</p>
                            <span id="total">R${{number_format($total_price, 2, ',', '.')}}</span>
                            <a id="btn-finalizar" href="{{ route('cart.checkout') }}" class="button-tabula-gray">Finalizar Compra</a>

                            <a id="btn-continuar" href="{{ route('search.single', ['id' => -1]) }}" class="button-tabula-gray">Continuar</a>
                        </div>

                    </div>
                </div>
                <div class="column col-1"></div>            
            </div>
        </div>
    </section> 

    <script type="text/javascript">
        $(document).ready(function(){
            $('#cupom').click(function(event){
                var codCupom = $('#codCupom').val();
                var idCourse = $('#idCourse').val();
                var url = '{{route('cart.cupom')}}';
                $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        codCupom: codCupom,
                    },
                    beforeSend: function(){
                    },
                    success: function(data){
                        var result = $.parseJSON(data);
                        $('#total').html('R$'+result.total);
                        console.log(result);   

                    },
                });
            });
        });
    </script>

    @endif
    @endsection