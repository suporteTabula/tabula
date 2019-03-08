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
					<label for="codCupom">Código Cupom</label>
					<input class="form-control" type="text" name="codCupom" placeholder="Código Cupom" value="{{ $cupom->codCupom }}">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="descCupom">Descrição Cupom</label>
					<input class="form-control" name="descCupom" type="text" placeholder="Descrição Cupom" value="{{ $cupom->descCupom }}">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="tipoCupom">Tipo Cupom</label>
					<select class="form-control" id="tipoCupom" name="tipoCupom">
						<option value="Porcentagem">Desconto Porcentagem</option>
						<option value="Fixo Carrinho">Desconto  fixo de carrinho</option>
						<option value="Fixo Produto">Desconto fixo de produto</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-6">
					<label for="valorCupom">Valor Cupom</label>
					<input class="form-control input-price" type="text" name="valorCupom" placeholder="Valor Cupom" value="{{ $cupom->valorCupom }}">
				</div>
				
				<div class="col-xs-6">
					<label for="expiraCupom">Data de Expiração Cupom</label>
					<input class="form-control" type="text" name="expiraCupom" placeholder="DD/MM/AAAA" value="{{ $cupom->expiraCupom }}">
				</div>
				
			</div>

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="limiteCupom">Limite de Uso do Cupom</label>
					<input class="form-control" type="text" name="limiteCupom" placeholder="Limite de Uso" value="{{ $cupom->limiteCupom }}">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="curso_id">Curso</label>
					<select class="form-control" id="curso_id" name="curso_id">
						<option value="" selected disabled hidden>Escolha uma...</option>
						@foreach($cursos as $curso)
						<option value="{{ $curso->id }}">{{ $curso->desc }}</option>
						@endforeach
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

	$('.state').hide();
	$('#country').change(function(){
		if($('#country').val() == 1){
			$('.state').show();
		} else{
			$('.state').hide();
		}
	});

</script>
@stop
@stop