@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Adicionar novo tipo de usuário
		</div>
		<div class="panel-body">
			<form action="{{ route('userType.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				
				<div class="form-group">
					<label for="desc">Nome</label>

					<input class="form-control" type="text" name="desc" placeholder="Nome do tipo de usuário" value="{{ old('desc') }}">
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Adicionar</button>
						<a class="btn btn-success" href="{{ route('usersType') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop