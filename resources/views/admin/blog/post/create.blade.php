@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Criar nova categoria do Blog
		</div>
		<div class="panel-body">
			<form action="{{ route('blog.post.store') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Titulo</label>
					<input class="form-control" type="text" name="name" placeholder="Titulo do post" value="{{ old('name') }}">
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
					<label for="keywords">KeyWord</label>
					<input class="form-control" type="text" name="keywords" placeholder="Definir KeyWord" value="{{ old('keyword') }}">
				</div>
				<div class="form-group">
					<label for="category_id">Categoria do Blog</label>
					<select name="category_id" class="form-control">
						@forelse($categories as $category)
						<option value="{{$category->id}}" @if($category->id == $post->category_id) selected @endif>{{$category->name}}</option>
						@empty
						@endforelse
					</select>
				</div>
				<div class="form-group">
					<label for="content">Conteúdo</label>
					<textarea name="content" class="form-control" rows="8"></textarea>
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Criar</button>
						<a class="btn btn-success" href="{{ route('blog.post.index') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop