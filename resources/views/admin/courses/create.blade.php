@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Cadastrar novo curso
		</div>
		<div class="panel-body">
			<form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" name="name" placeholder="Nome do curso" value="{{ old('name') }}">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" name="desc" placeholder="Descrição do curso" value="{{ old('desc') }}">
				</div>
				<div class="form-group">
					<label for="category_id">Categoria</label>
					<select class="form-control" id="category_id" name="category_id">
						<option value="" selected disabled hidden>Escolha uma...</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->desc }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="price">Preço</label>
					<input class="form-control" type="text" name="price" placeholder="Preço do curso" value="{{ old('price') }}">
				</div>
				<div class="form-group">
					<label for="thumb_img">Imagem da Vitrine</label>
					<input class="form-control" type="file" name="thumb_img">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Criar</button>
						<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop