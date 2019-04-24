@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar categoria do Blog
		</div>
		<div class="panel-body">
			<form action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{$categBlog->id}}">
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" name="name" placeholder="Nome da Categoria" value="{{ $categBlog->name }}">
				</div>
				<div class="form-group">
					<label for="meta_title">Meta Title</label>
					<input class="form-control" type="text" name="meta_title" placeholder="Definir Meta Title" value="{{ $categBlog->meta_title }}">
				</div>
				<div class="form-group">
					<label for="meta_description">Meta Description</label>
					<input class="form-control" type="text" name="meta_description" placeholder="Definir Description" value="{{ $categBlog->meta_description }}">
				</div>
				<div class="form-group">
					<label for="keyword">KeyWord</label>
					<input class="form-control" type="text" name="keyword" placeholder="Definir KeyWord" value="{{ $categBlog->keyword }}">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Editar</button>
						<a class="btn btn-success" href="{{ route('blog') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop