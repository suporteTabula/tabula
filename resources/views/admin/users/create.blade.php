@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Adicionar novo Usuário
		</div>
		<div class="panel-body">
			<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="userType">Tipo de usuário</label>

					<select id="userType" name="userType_id" class="form-control">
						@foreach ($usersType as $userType)
							<option value="{{ $userType->id }}"> {{ $userType->type_name }} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="name">Nome</label>

					<input class="form-control" type="text" name="name">
				</div>

				<div class="form-group">
					<label for="email">E-mail</label>

					<input class="form-control" type="email" name="email">
				</div>

				<div class="form-group">
					<label for="password">Senha</label>

					<input class="form-control" type="password" name="password">
				</div>
				
				<div class="form-group">
					<div class="text-center">
						<button class="button btn-success" type="submit">Adicionar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop