@extends('layouts.app')

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
					<input class="form-control" type="text" value="{{ $company->name }}" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $company->desc }}" name="desc">
				</div>
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
						<button class="button btn-success" type="submit">Editar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop