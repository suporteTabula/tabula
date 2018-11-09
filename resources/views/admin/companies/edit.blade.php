@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar empresa
		</div>
		<div class="panel-body">
			<form action="{{ route('companies.update', ['id' => $company->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" value="{{ $company->name }}" placeholder="Nome da empresa" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $company->desc }}" placeholder="Descrição da empresa" name="desc">
				</div>
				<div class="form-group">
					<label for="theme_color">Tema</label>
					<select class="form-control" id="theme_color" name="theme_color">
						<option value="rose" @if ($company->theme_color == "rose") selected
						@endif>Rosa</option>
						<option value="gray" @if ($company->theme_color == "gray") selected
						@endif>Cinza Escuro</option>
						<option value="white" @if ($company->theme_color == "white") selected
						@endif>Branco</option>
						<option value="purple" @if ($company->theme_color == "purple") selected
						@endif>Roxo</option>
						<option value="blue" @if ($company->theme_color == "blue") selected
						@endif>Azul</option>
					</select>
				</div>
				<table class="table table-hover">
					<thead>
						<th>Grupos Associados</th>
					</thead>
					<tbody>
						@foreach($company->userGroups as $userGroup)
							<tr>
								<td>{{ $userGroup->desc }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<table class="table table-hover">
					<thead>
						<th>Usuários associados</th>
					</thead>
					<tbody>
						@foreach($company->users as $user)
							<tr>
								<td>{{ $user->first_name }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('companies') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop