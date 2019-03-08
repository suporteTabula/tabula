@extends('layouts.companies')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo usuário
	</div>
	<div class="panel-body">
		<form action="{{ route('teachers.company.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<input type="hidden" name="usersType" value="3">


			<div class="form-group row">
				<div class="col-xs-4">
					<label for="country">País</label>
					<select id="country" name="country_id" class="form-control">
						<option value="" selected disabled hidden>Escolha um...</option>
						@foreach ($countries as $country)
						<option value="{{ $country->id }}"> {{ $country->name }} </option>
						@endforeach
					</select>
				</div>

				<div class="col-xs-4">
					<div class="state">
						<label for="state">Estado</label>
						<select id="state" name="state_id" class="form-control">
							<option selected disabled hidden>Escolha um...</option>
							@foreach ($states as $state)
							<option value="{{ $state->id }}"> {{ $state->name }} </option>
							@endforeach
						</select>
					</div>
				</div>

			</div>

			<div class="form-group row">
				<div class="col-xs-6">
					<label for="login">Login</label>
					<input class="form-control" type="text" name="login" placeholder="Seu login" value="{{ old('login') }}">
				</div>

				<div class="col-xs-6">
					<label for="password">Senha</label>
					<input class="form-control" type="password" placeholder="Sua senha" name="password">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-6">
					<label for="name">Nome Completo</label>
					<input class="form-control" name="name" type="text" placeholder="Seu nome" value="{{ old('name') }}">
				</div>

				<div class="col-xs-6">
					<label for="birthdate">Data de Nascimento</label>
					<input class="form-control" type="text" name="birthdate" placeholder="DD/MM/AAAA" value="{{ old('birthdate') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="email">E-mail</label>
				<input class="form-control" type="email" name="email" placeholder="exemplo@email.com" value="{{ old('email') }}">
			</div>

			<label for="birthdate">Sexo: </label>
			<label class="radio-inline"><input type="radio" name="sex" value="Masculino">Masculino</label>
			<label class="radio-inline"><input type="radio" name="sex" value="Feminino">Feminino</label>

			<div class="form-group row">
				<div class="col-xs-6">
					<label for="occupation">Cargo</label>
					<input class="form-control" type="text" name="occupation" placeholder="Seu cargo" value="{{ old('occupation') }}">
				</div>

				<div class="col-xs-6">
					<label for="website">Website</label>
					<input class="form-control" type="text" name="website" placeholder="https://..." value="{{ old('website') }}">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-6">
					<label for="google_plus">Google +</label>
					<input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ old('google_plus') }}">
				</div>

				<div class="col-xs-6">
					<label for="twitter">Twitter</label>
					<input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ old('twitter') }}">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-6">
					<label for="facebook">Facebook</label>
					<input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ old('facebook') }}">
				</div>

				<div class="col-xs-6">
					<label for="youtube">Youtube</label>
					<input class="form-control" type="text" name="youtube" placeholder="https://..." value="{{ old('youtube') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="schooling">Escolaridade</label>
				<select id="schooling" name="schooling_id" class="form-control">
					<option value="" selected disabled hidden>Escolha uma...</option>
					@foreach ($schoolings as $schooling)
					<option value="{{ $schooling->id }}"> {{ $schooling->desc }} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="bio">Conte-nos um pouco sobre você:</label>
				<textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ old('bio') }}</textarea>
			</div>

			<div class="text-center">
				<button class="btn btn-success" type="submit">Adicionar</button>
				<a class="btn btn-success" href="{{ route('users') }}">Voltar</a>
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