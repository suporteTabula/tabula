@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Criar nova categoria do Blog
		</div>
		<div class="panel-body">
			<form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" name="name" placeholder="Nome da Categoria" value="{{ old('name') }}">
				</div>
				<div class="form-group">
					<label for="meta_title">Meta Title</label>
					<input class="form-control" type="text" name="meta_title" placeholder="Definir Meta Title" value="{{ old('meta_title') }}">
				</div>
				<div class="form-group">
					<label for="meta_description">Meta Description</label>
					<input class="form-control" type="text" name="meta_description" placeholder="Definir Description" value="{{ old('meta_description') }}">
				</div>
				<div class="form-group">
					<label for="keyword">KeyWord</label>
					<input class="form-control" type="text" name="keyword" placeholder="Definir KeyWord" value="{{ old('keyword') }}">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Criar</button>
						<a class="btn btn-success" href="{{ route('blog') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop