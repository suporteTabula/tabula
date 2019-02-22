@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="CardJs-master/card-js.min.css">

<br><br><br>


<section class="paymentForm">
  <div class="container">
    <div class="columns">
      <div class="column col-8">
        <div class='card-wrapper'>
          <form class="form-inline">
            <div class="form-group">
              <select class="custom-select"  name="payment" id="payment">
                <option value="">Selecione forma de pagamento</option>
                <option value="cardOption">Cartão de Crédito</option>
                <option value="boletoOption">Boleto</option>
              </select>
            </div>
          </form>
        </div>
        <div id="paymentForm">
          <div id="cardOption">
            <form action="{{ route('transaction.success') }}" method="post" data-yapay="payment-form">
              <div class="row">
                <input class="button-tabula-white formInput" maxlength="16" type="text" name="number" placeholder="Número Cartão">
                <select class="form-control" name="monthExpiry" id="monthExpiry">
                  <option value="">MM</option>
                  <option value="01">Jan</option>
                  <option value="02">Fev</option>
                  <option value="03">Mar</option>
                  <option value="04">Abr</option>
                  <option value="05">Mai</option>
                  <option value="06">Jun</option>
                  <option value="07">Jul</option>
                  <option value="08">Ago</option>
                  <option value="09">Set</option>
                  <option value="10">Out</option>
                  <option value="11">Nov</option>
                  <option value="12">Dez</option>
                </select>
                <select class="form-control"  name="yearExpiry" id="yearExpiry">
                  <option value="">YYYY</option>
                  <option value="2020">2020</option>
                </select>
              </div>
              <div class="row">
                <input class="button-tabula-white formInput" type="text" name="cardName" placeholder="Nome no Cartão"/>
                <input class="button-tabula-white formInput" type="text" maxlength="15" name="cpf" placeholder="CPF"/>
              </div>
              <div class="row">
                <input class="buttonQ-tabula-white formInput" type="text" name="cvv" placeholder="CVV"/>
                <select class="form-control"  name="parcel" id="parcel">
                  <option value="{{$total_price}}">Numero de parcelas</option>
                  <option value="{{$total_price}}">6 X R$ <?php $new_price = $total_price/6;echo round($new_price, 2)?> sem Juros</option>
                  <option value="{{$total_price}}">5 X R$ <?php $new_price = $total_price/5;echo round($new_price, 2)?> sem Juros</option>
                  <option value="{{$total_price}}">4 X R$ <?php $new_price = $total_price/4;echo round($new_price, 2)?> sem Juros</option>
                  <option value="{{$total_price}}">3 X R$ <?php $new_price = $total_price/3;echo round($new_price, 2)?> sem Juros</option>
                  <option value="{{$total_price}}">2 X R$ <?php $new_price = $total_price/2;echo round($new_price, 2)?> sem Juros</option>
                  <option value="{{$total_price}}">R$ {{ $total_price}} à Vista</option>
                </select>
                <button class="button-tabula-gray paymentButton">Continuar</button>
              </div>
            </form>
          </div>
          <div id="boletoOption">
            <form action="{{ route('transaction.success') }}" method="post" data-yapay="payment-form">
              <div class="row">               
                <input class="button-tabula-white formInput" type="text" maxlength="15" name="cpf" placeholder="CPF"/>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="column col-4">
        <h4>Detalhes da Compra</h4>
        <table class="table table-hover">
          <tr>
            <th>Nome do Curso</th>
            <th>Valor do Curso</th>
          </tr>
          @if(count($courses) > 0)
          @foreach($courses as $course)
          <tr>
            <td>{{ $course->name }}</td>
            <td>R$ {{ $course->id }}</td>
          </tr>
          @endforeach
          <tr>
            <td>Total:</td>
            <td><strong>R$ {{ $total_price }}</strong></td>
          </tr>
          @else
          <tr><td>Não existem items para finalizar a compra!</td></tr>
          <tr><td>Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">Catálogo</a></td></tr>
          @endif
        </table>
      </div>


      <script>
        $(document).ready(function(){
          $('#boletoOption').hide();
          $('#cardOption').hide();
          $('#payment').change(function(event){
            var payment = $(this).val();

            if(payment == 'cardOption'){
              $('#boletoOption').hide();
              $('#cardOption').show();
            }else{
              $('#cardOption').hide();
              $('#boletoOption').show();
            }
          });
        });

                /*var card = new Card({
                   form: document.querySelector('#payment'),
                   container: '.card-wrapper',

                   formSelectors: {
                    nameInput: 'input[name="first-name"], input[name="last-name"]'
                }
              });*/
            </script>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://static.traycheckout.com.br/js/finger_print.js" type="text/javascript"></script>
  <script>window.yapay.FingerPrint({ env: 'sandbox' });</script>

  <script src="js/main.js"></script>

  @endsection