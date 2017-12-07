@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Cadastrar nova empresa
		</div>
		<div class="panel-body">
			<form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" name="desc">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="button btn-success" type="submit">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop