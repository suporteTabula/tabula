@extends('layouts.admin')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo usuário
	</div>
	<div class="panel-body">
		<form action="{{ route('cupom.update', ['id' => $cupom->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="tipoCupom">Tipo Cupom</label>
					<select class="form-control" id="tipoCupom" name="tipoCupom">
						<option selected disabled hidden>Escolha uma...</option>
						<option value="porcentagem" <?php if ($cupom->tipo_cupom == 'porcentagem') echo "selected"; ?>>Desconto Porcentagem</option>
						<option value="carrinho" <?php if ($cupom->tipo_cupom == 'carrinho') echo "selected"; ?>>Desconto  fixo de carrinho</option>
						<option value="produto" <?php if ($cupom->tipo_cupom == 'produto') echo "selected"; ?>>Desconto fixo de produto</option>
						<option value="macrotema" <?php if ($cupom->tipo_cupom == 'macrotema') echo "selected"; ?>>Desconto fixo de Macrotema</option>
						<option value="subcategoria" <?php if ($cupom->tipo_cupom == 'subcategoria') echo "selected"; ?>>Desconto fixo de Subcategoria</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="codCupom">Código Cupom</label>
					<input class="form-control" type="text" name="codCupom" placeholder="Código Cupom" value="{{ $cupom->cod_cupom }}">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="descCupom">Descrição Cupom</label>
					<input class="form-control" name="descCupom" type="text" placeholder="Descrição Cupom" value="{{ $cupom->desc_cupom }}">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-4">
					<label for="valorCupom">Valor Cupom</label>
					<input class="form-control input-price" type="text" name="valorCupom" placeholder="Valor Cupom" value="{{ number_format($cupom->valor_cupom , 2, ',', ' ')}}">
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
						@foreach($cupom->type_id as $type_id)
						@if($category->find($type_id)->category_id_parent == NULL)
						<option value="{{$type_id}}" selected>{{$category->find($type_id)->desc}}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class="col-xs-8 subcateg">
					<label for="type_id">Subcategoria</label>
					<select class="form-control multiple" style='width: 400px;' name="type_id[]"  multiple="multiple">
						<option value='0'>- Digite a Subcategoria -</option>
						@foreach($cupom->type_id as $type_id)
						@if($category->find($type_id)->category_id_parent != NULL)
						<option value="{{$type_id}}" selected>{{$category->find($type_id)->desc}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>



			<div class="text-center">
				<button class="btn btn-success" type="submit">Editar</button>
				<a class="btn btn-success" href="{{ route('cupom') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>

@section('scripts')
<script>

	$(document).ready(function() {
		if ($('select[name="tipoCupom"]').val() == 'produto') {
			$('.course').show();
			$('.macrotema').hide();
			$('.subcateg').hide();
		}else if($('select[name="tipoCupom"]').val() == 'macrotema'){
			$('.course').hide();
			$('.macrotema').show();
			$('.subcateg').hide();
		}else if($('select[name="tipoCupom"]').val() == 'subcategoria'){	
			$('.course').hide();
			$('.macrotema').hide();
			$('.subcateg').show();
		}else{
			$('.course').hide();
			$('.macrotema').hide();
			$('.subcateg').hide();
		}
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


	
	$('#tipoCupom').change(function(){
		if($(this).val() == 'produto'){
			$('.course').show();	
			$('.macrotema').hide();
			$('.subcateg').hide();
		}else{
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