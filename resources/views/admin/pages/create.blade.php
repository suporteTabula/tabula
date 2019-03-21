@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Incluir nova página
		</div>
		<div class="panel-body">
			<form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="typePage">Tipo de Página</label>
					<select id="typePage" name="typePage" class="form-control">
						<option value="" selected disabled hidden>Escolha uma...</option>
						<option value="	">Central de Ajuda</option>
						<option value="Perguntas Frequentes">Perguntas Frequentes</option>
						<option value="Termos e Condições">Termos e Condições</option>
						<option value="Política de Privacidade">Política de Privacidade</option>
						<option value="Política de Propriedade Intelectual">Política de Propriedade Intelectual</option>
					</select>
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<textarea class="form-control" rows="5" id="desc" name="desc" placeholder="Escreva aqui...">
						{{old('desc')}}
					</textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Criar</button>
						<a class="btn btn-success" href="{{ route('pages') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop