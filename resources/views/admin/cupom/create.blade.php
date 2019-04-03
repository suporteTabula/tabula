@extends('layouts.admin')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo usuário
	</div>
	<div class="panel-body">
		<form action="{{ route('cupom.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="tipoCupom">Tipo Cupom</label>
					<select class="form-control" id="tipoCupom" name="tipoCupom">
						<option selected disabled hidden>Escolha uma...</option>
						<option value="porcentagem">Desconto Porcentagem</option>
						<option value="carrinho">Desconto  fixo de carrinho</option>
						<option value="produto">Desconto fixo de produto</option>
						<option value="macrotema">Desconto fixo de Macrotema</option>
						<option value="subcategoria">Desconto fixo de Subcategoria</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="limiteCupom">Código Cupom</label>
					<input class="form-control" type="text" name="codCupom" placeholder="Código Cupom" value="{{ old('codCupom') }}">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="descCupom">Descrição Cupom</label>
					<input class="form-control" name="descCupom" type="text" placeholder="Descrição Cupom" value="{{ old('descCupom') }}">
				</div>
			</div>			

			<div class="form-group row">
				<div class="col-xs-4">
					<label for="price">Valor Cupom</label>
					<input class="form-control input-price" type="text" name="valorCupom" placeholder="Valor Cupom" value="{{ old('valorCupom') }}">
				</div>
				<div class="col-xs-8 course">
					<label for="type_id">Curso</label>
					<select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
						<option value='0'>- Digite o Curso -</option>
					</select>
				</div>
				<div class="col-xs-8 macrotema">
					<label for="type_id">Macrotema</label>
					<select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
						<option value='0'>- Digite o Macrotema -</option>
					</select>
				</div>
				<div class="col-xs-8 subcateg">
					<label for="type_id">Subcategoria</label>
					<select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
						<option value='0'>- Digite a Subcategoria -</option>
					</select>
				</div>
			</div>



			<div class="text-center">
				<button class="btn btn-success" type="submit">Adicionar</button>
				<a class="btn btn-success" href="{{ route('cupom') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>

@section('scripts')
<script>

	$(document).ready(function() {
	    $(".multiple").select2({
            ajax: { 
             url: "{{route('cupom.search')}}",
             type: "post",
             dataType: 'json',
             delay: 250,
             
             data: function (params) {
              return {
                searchTerm: params.term,
                type: $('select[name="tipoCupom"]').val(),
              };
             },
             processResults: function (response) {
             	console.log(response);
               return {
                  results: response
               };
             },
             cache: true
            },
            minimumInputLength: 3
        });  

	});


	$('.course').hide();
	$('.macrotema').hide();
	$('.subcateg').hide();
	$('#tipoCupom').change(function(){
		if($(this).val() == 'produto'){
			$('.course').show();	
			$('.macrotema').hide();
			$('.subcateg').hide();
		} else{
			if ($(this).val() == 'macrotema') {
				$('.macrotema').show();
				$('.course').hide();
				$('.subcateg').hide();
			}else{
				if ($(this).val() == 'subcategoria') {
					$('.subcateg').show();
					$('.macrotema').hide();
					$('.course').hide();
				}else{
					$('.subcateg').hide();
					$('.macrotema').hide();
					$('.course').hide();
				}
			}
		}
	});

</script>
@stop
@stop