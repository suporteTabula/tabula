@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Criar novo grupo
		</div>
		<div class="panel-body">
			<form action="{{ route('userGroups.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="desc">Nome</label>
					<input class="form-control" type="text" name="desc" placeholder="Nome do grupo" value="{{ old('desc') }}">
				</div>
				<div class="form-group">
					<label for="company_id">Empresas</label>
					<select id="company" name="company_id" class="form-control">
						<option value="" selected disabled hidden>Escolha uma...</option>
						@foreach ($companies as $company)
							<option value="{{ $company->id }}"> {{ $company->name }} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Criar</button>
						<a class="btn btn-success" href="{{ route('userGroups') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop