@extends('layouts.user')

@section('content')
<link rel="stylesheet" href="CardJs-master/card-js.min.css">

<br><br><br>


<section class="paymentForm">
  <div class="container">
    <div class="columns">
      <div class="column col-8">
        <div class='card-wrapper'>
          <form class="form-control" action="{{ route('transaction.success') }}" method="post" data-yapay="payment-form">
            <div class="form-row">
              <div class="form-group col-md-8">
                <label for="name">Nome Completo</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nome Completo">
              </div>
              <div class="form-group col-md-4">
                <label for="phone">Telefone Celular</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="(XX) 0000-0000">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Endereço">
              </div>
              <div class="form-group col-md-2">
                <label for="numAddress">Número</label>
                <input type="text" class="form-control" id="numAddress" name="numAddress" placeholder="Número">
              </div>
            </div>
            <div class="form-row"> 
              <div class="form-group col-md-6">
                <label for="neighborhood">Bairro</label>
                <input type="text" class="form-control" name="neighborhood" id="neighborhood">
              </div>
              <div class="form-group col-md-6">
                <label for="cpf">CPF</label>
                <input class="button-tabula-white formInput" type="text" maxlength="15" name="cpf" placeholder="CPF"/>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="city">Cidade</label>
                <input type="text" class="form-control" name="city" id="city">
              </div>
              <div class="form-group col-md-4">
                <label for="state">Estado</label>
                <select id="state" name="state" class="form-control">
                  <option selected>Escolha</option>
                  <option value="SP">SP</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep">
              </div>
            </div>
            <select class="custom-select"  name="payment" id="payment">
              <option value="">Selecione forma de pagamento</option>
              <option value="cardOption">Cartão de Crédito</option>
              <option value="boletoOption">Boleto</option>
            </select>
            <div id="paymentForm">
              <div id="cardOption">
                <form action="{{ route('transaction.success') }}" method="post" data-yapay="payment-form">
                  <div class="row">
                    <input class="button-tabula-white formInput" maxlength="16" type="text" name="number" placeholder="Número Cartão">
                    <input class="button-tabula-white formInput" type="text" name="cardName" placeholder="Nome no Cartão"/>
                    <select class="form-control" name="paymentMethod" id="paymentMethod">
                      <option value="">Selcione a bandeira</option>
                      <option value="2">Diners Club</option>
                      <option value="3">Visa</option>
                      <option value="4">MasterCard</option>
                      <option value="5">American Express</option>
                      <option value="15">Discover</option>
                      <option value="16">Elo</option>
                      <option value="18">Aura</option>
                      <option value="19">JCB</option>
                      <option value="20">Hipercard</option>
                      <option value="25">Hiper (Itaú)</option>
                    </select>
                  </div>
                  <div class="row">
                    <select class="form-control col-md-4" name="monthExpiry" id="monthExpiry">
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
                    <select class="form-control col-md-8"  name="yearExpiry" id="yearExpiry">
                      <option value="">YYYY</option>
                      <option value="2020">2020</option>
                    </select>
                  </div>
                  <div class="row">
                    <input class="buttonQ-tabula-white formInput" type="text" name="cvv" placeholder="CVV"/>
                    <select class="form-control"  name="parcel" id="parcel">
                      <option value="">Numero de parcelas</option>
                      <option value="6">6 X R$ <?php $new_price = $total_price/6;echo round($new_price, 2)?> sem Juros</option>
                      <option value="5">5 X R$ <?php $new_price = $total_price/5;echo round($new_price, 2)?> sem Juros</option>
                      <option value="4">4 X R$ <?php $new_price = $total_price/4;echo round($new_price, 2)?> sem Juros</option>
                      <option value="3">3 X R$ <?php $new_price = $total_price/3;echo round($new_price, 2)?> sem Juros</option>
                      <option value="2">2 X R$ <?php $new_price = $total_price/2;echo round($new_price, 2)?> sem Juros</option>
                      <option value="1">R$ {{ $total_price}} à Vista</option>
                    </select>
                  </div>
                  <button class="button-tabula-gray paymentButton">Continuar</button>
                </form>
              </div>
              <div id="boletoOption">
                <div class="row">               
                  <input type="hidden" name="paymentMethod" value="6">
                  <button class="button-tabula-gray paymentButton">Gerar Boleto</button>
                </div>
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
            <td>R$ {{number_format($course->price, 2, ',', '.')}}</td>
          </tr>
          @endforeach
          <tr>
            <td>Subtotal:</td>
            <td><strong>R$ {{ number_format($total_price, 2, ',', '.') }}</strong></td>
          </tr>
          <tr>
            <td>Desconto:</td>
            <td><strong>R$ {{ number_format($session['descontoTotal'], 2, ',', '.') }}</strong></td>
          </tr>
          <tr>
            <td>Total:</td>
            <td><strong>R$ {{ number_format($session['total'], 2, ',', '.') }}</strong></td>
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