@extends('layouts.teacher')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo usuário
	</div>
	<div class="panel-body">
		<form action="{{ route('cupom.store.teacher') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
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
					<label for="price">Valor Cupom</label>
					<input class="form-control input-price" type="text" name="valorCupom" placeholder="Valor Cupom" value="{{ old('valorCupom') }}">
				</div>
				
				<div class="col-xs-6">
					<label for="expiraCupom">Data de Expiração Cupom</label>
					<input class="form-control" type="text" name="expiraCupom" placeholder="DD/MM/AAAA" value="{{ old('expiraCupom') }}">
				</div>
				
			</div>

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="limiteCupom">Limite de Uso do Cupom</label>
					<input class="form-control" type="text" name="limiteCupom" placeholder="Limite de Uso" value="{{ old('limiteCupom') }}">
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
				<a class="btn btn-success" href="{{ route('cupom.teacher') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>

@stop