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
					<input class="form-control" type="text" name="desc">
				</div>
				<div class="form-group">
					<label for="company_id">Empresas</label>
					<select id="company" name="company_id" class="form-control">
						@foreach ($companies as $company)
							<option value="{{ $company->id }}"> {{ $company->name }} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="button btn-success" type="submit">Criar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop