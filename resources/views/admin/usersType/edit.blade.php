@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar grupo
		</div>
		<div class="panel-body">
			<form action="{{ route('userType.update', ['id' => $userType->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="desc">Nome</label>
					<input class="form-control" type="text" value="{{ $userType->desc }}" placeholder="Nome do tipo de usuário" name="desc">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('usersType') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop