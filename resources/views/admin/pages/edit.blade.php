@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Incluir nova página
		</div>
		<div class="panel-body">
			<form action="{{ route('pages.update', ['id' => $page->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
				<label for="typePage">Nome</label>
					<input class="form-control" type="text" name="typePage" placeholder="Escreva aqui..." value="{{$page->type_page}}">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<textarea class="form-control" rows="5" id="desc" name="desc" placeholder="Escreva aqui...">{{$page->desc}}</textarea>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Editar</button>
						<a class="btn btn-success" href="{{ route('pages') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop