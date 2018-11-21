@extends('layouts.user')
 
@section('content')
<link rel="stylesheet" href="CardJs-master/card-js.min.css">
  
    <br><br><br><br>
    
    
    Detalhes da compra
    
    <section class="paymentForm">
        <div class="container grid-sm">
            <div class="columns">
                <div class="column col-12">
                    <div class='card-wrapper'>

                    </div>
                    <form id="payment" method="post" action="{{route('transaction.success')}}">
                    {{ csrf_field() }}
                        <input class="button-tabula-white formInput" type="text" name="number" placeholder="Número do Cartão">
                        <input class="button-tabula-white formInput" type="text" name="cvv" placeholder="CVV"/>
                        <input class="button-tabula-white formInput" type="text" name="first-name" placeholder="Nome"/>
                        <input class="button-tabula-white formInput" type="text" name="last-name" placeholder="Sobrenome"/>
                        <input class="button-tabula-white formInput" type="text" name="expiry" placeholder="Validade"/>
                        <button class="button-tabula-gray paymentButton">Continuar</button>
                        <!-- <a href="{{ route('transaction.success') }}" class="button-tabula-gray paymentButton">Continuar</a> -->
                    </form>
                    <script>
                        var card = new Card({
                         form: document.querySelector('#payment'),
                        container: '.card-wrapper',
        
                        formSelectors: {
                        nameInput: 'input[name="first-name"], input[name="last-name"]'
                     }
                    });
                    </script>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="paymentForm">
        
    </section>
   

<script src="js/main.js"></script>
    <table>

        @if(count($courses) > 0)
            @foreach($courses as $course)
            	<tr>
            		<td>{{ $course->name }}</td>
                    <td>{{ $course->desc }}</td>
                    <br><br><br>

                       
            	</tr>
            @endforeach
            <tr><td>Total: {{ $total_price }}</td></tr>
            <tr><td></td></tr>

              
        @else
            <tr><td>Não existem items para finalizar a compra!</td></tr>
            <tr><td>Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a></td></tr>
         
       
        @endif
    </table>
@endsection