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

				<label for="userType">Tipo de usuário: </label>
				@foreach ($usersType as $userType)
					<label class="checkbox-inline"><input type="checkbox" name="usersType[]" value="{{ $userType->id }}"> {{ $userType->desc }}</label>
				@endforeach

				<div class="form-group row">
					<div class="col-xs-4">
						<label for="state">Estado</label>
						<select id="state" name="state_id" class="form-control">
							@foreach ($states as $state)
								<option value="{{ $state->id }}"> {{ $state->name }} </option>
							@endforeach
					</select>
					</div>

					<div class="col-xs-4">
						<label for="country">País</label>
						<select id="country" name="country_id" class="form-control">
							@foreach ($countries as $country)
								<option value="{{ $country->id }}"> {{ $country->name }} </option>
							@endforeach
					</select>
					</div>

				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="login">Login</label>
						<input class="form-control" type="text" name="login">
					</div>

					<div class="col-xs-6">
						<label for="password">Senha</label>
						<input class="form-control" type="password" name="password">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
				    	<label for="first_name">Primeiro Nome</label>
				    	<input class="form-control" name="first_name" type="text">
				  	</div>

				  	<div class="col-xs-6">
				    	<label for="last_name">Sobrenome</label>
				    	<input class="form-control" name="last_name" type="text">
				  	</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="nickname">Apelido</label>
						<input class="form-control" type="text" name="nickname">
					</div>

					<div class="col-xs-6">
						<label for="birthdate">Data de Nascimento</label>
						<input class="form-control" type="text" name="birthdate">
					</div>
				</div>

				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" type="email" name="email">
				</div>

				<label for="birthdate">Sexo: </label>
				<label class="radio-inline"><input type="radio" name="sex" value="Masculino">Masculino</label>
				<label class="radio-inline"><input type="radio" name="sex" value="Feminino">Feminino</label>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="occupation">Cargo</label>
						<input class="form-control" type="text" name="occupation">
					</div>

					<div class="col-xs-6">
						<label for="website">Website</label>
						<input class="form-control" type="text" name="website">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="google_plus">Google +</label>
						<input class="form-control" type="text" name="google_plus">
					</div>

					<div class="col-xs-6">
						<label for="twitter">Twitter</label>
						<input class="form-control" type="text" name="twitter">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="facebook">Facebook</label>
						<input class="form-control" type="text" name="facebook">
					</div>

					<div class="col-xs-6">
						<label for="youtube">Youtube</label>
						<input class="form-control" type="text" name="youtube">
					</div>
				</div>

				<div class="form-group">
					<label for="schooling">Escolaridade</label>
					<select id="schooling" name="schooling_id" class="form-control">
						@foreach ($schoolings as $schooling)
							<option value="{{ $schooling->id }}"> {{ $schooling->desc }} </option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
  					<label for="bio">Conte-nos um pouco sobre você:</label>
  					<textarea class="form-control" rows="5" id="bio" name="bio"></textarea>
				</div>

				<div class="text-center">
					<button class="button btn-success" type="submit">Adicionar</button>
				</div>

			</form>
		</div>
	</div>

@stop