@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar grupo
		</div>
		<div class="panel-body">
			<form action="{{ route('userGroups.update', ['id' => $userGroup->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="desc">Nome</label>
					<input class="form-control" type="text" value="{{ $userGroup->desc }}" name="desc">
				</div>
				<div class="form-group">
					<label for="company_id">Empresa</label>
					<select id="company" name="company_id" class="form-control">
						@foreach ($companies as $company)
							<option value="{{ $company->id }}"
							@if($userGroup->company->id == $company->id)
								selected
							@endif
							> {{ $company->name }} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="button btn-success" type="submit">Editar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop