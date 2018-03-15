@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')

	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Usuário: {{$user->login}}
		</div>
		<div class="panel-body">
			<form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
				{{ csrf_field() }}

				<div class="form-group row">
					<div class="col-xs-4">
						<label for="userType">Tipo de usuário: </label>
						@foreach ($usersType as $userType)
							<label class="checkbox-inline"><input type="checkbox" name="usersType[]" value="{{ $userType->id }}" 
								@foreach ($user->userTypes as $type)
									@if ($type->id == $userType->id)
										checked
									@endif
								@endforeach
								> {{ $userType->desc }}</label>
						@endforeach
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-4">
						<label for="group">Grupo de usuários</label>
						<select id="group_id" name="group" class="form-control">
							<option value="">Nenhum</option>
							@foreach ($userGroups as $userGroup)
								<option value="{{ $userGroup->id }}" @if($user->group == $userGroup->desc) selected @endif> {{ $userGroup->desc }} </option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-4">
						<label for="country">País</label>
						<select id="country" name="country_id" class="form-control">
							@foreach ($countries as $country)
								<option value="{{ $country->id }}" @if($user->country_id == $country->id) selected @endif> {{ $country->name }} </option>
							@endforeach
						</select>
					</div>

					<div class="col-xs-4">
						<div class="state">
							<label for="state">Estado</label>
							<select id="state" name="state_id" class="form-control">
								@foreach ($states as $state)
									<option value="{{ $state->id }}" @if($user->state_id == $state->id) selected @endif> {{ $state->name }} </option>
								@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="login">Login</label>
						<input class="form-control" type="text" name="login" placeholder="Seu login" value="{{ $user->login }}">
					</div>
					<!-- 
					<div class="col-xs-6">
						<label for="password">Senha</label>
						<input class="form-control" type="password" placeholder="Sua senha" name="password">
					</div> 
					-->
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
				    	<label for="first_name">Primeiro Nome</label>
				    	<input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="{{ $user->first_name }}">
				  	</div>

				  	<div class="col-xs-6">
				    	<label for="last_name">Sobrenome</label>
				    	<input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $user->last_name }}">
				  	</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="nickname">Apelido</label>
						<input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $user->nickname }}">
					</div>

					<div class="col-xs-6">
						<label for="birthdate">Data de Nascimento</label>
						<input class="form-control" type="text" name="birthdate" placeholder="DD/MM/AAAA" value="{{ $user->birthdate }}">
					</div>
				</div>

				<div class="form-group">
					<label for="email">E-mail</label>
					<input class="form-control" type="email" name="email" placeholder="exemplo@email.com" value="{{ $user->email }}">
				</div>

				<label for="birthdate">Sexo: </label>
				<label class="radio-inline"><input type="radio" name="sex" value="Masculino" @if ($user->sex == 'Masculino')
				checked @endif>Masculino</label>
				<label class="radio-inline"><input type="radio" name="sex" value="Feminino" @if ($user->sex == 'Feminino')
				checked @endif>Feminino</label>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="occupation">Cargo</label>
						<input class="form-control" type="text" name="occupation" placeholder="Seu cargo" value="{{ $user->occupation }}">
					</div>

					<div class="col-xs-6">
						<label for="website">Website</label>
						<input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $user->website }}">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="google_plus">Google +</label>
						<input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $user->google_plus }}">
					</div>

					<div class="col-xs-6">
						<label for="twitter">Twitter</label>
						<input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $user->twitter }}">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-xs-6">
						<label for="facebook">Facebook</label>
						<input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $user->facebook }}">
					</div>

					<div class="col-xs-6">
						<label for="youtube">Youtube</label>
						<input class="form-control" type="text" name="youtube" placeholder="https://..." value="{{ $user->youtube }}">
					</div>
				</div>

				<div class="form-group">
					<label for="schooling">Escolaridade</label>
					<select id="schooling" name="schooling_id" class="form-control">
						@foreach ($schoolings as $schooling)
							<option value="{{ $schooling->id }}" @if ($user->schooling_id == $schooling->id) selected @endif> 
								{{ $schooling->desc }} 
							</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
  					<label for="bio">Conte-nos um pouco sobre você:</label>
  					<textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $user->bio }}</textarea>
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('users') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	@section('scripts')
		<script>

			if($('#country').val() == 1){
				$('.state').show();
			} else{
				$('.state').hide();
			}
			
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