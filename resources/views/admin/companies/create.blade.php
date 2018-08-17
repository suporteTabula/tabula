@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Cadastrar nova empresa
		</div>
		<div class="panel-body">
			<form action="{{ route('compaines.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" name="name" placeholder="Nome da empresa" value="{{ old('name') }}">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" name="desc" placeholder="Descrição da empresa" value="{{ old('desc') }}">
				</div>

				<div class="form-group">
					<label for="theme_color">Escolha um tema</label>
					<select class="form-control" id="theme_color" name="theme_color">
						<option value="" selected disabled hidden>Escolha um...</option>
						<option value="rose">Rosa</option>
						<option value="gray">Cinza Escuro</option>
						<option value="white">Branco</option>
						<option value="purple">Roxo</option>
						<option value="blue">Azul</option>
					</select>
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Cadastrar</button>
						<a class="btn btn-success" href="{{ route('compaines') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop