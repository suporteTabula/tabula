@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Cadastrar nova Categoria/Subcategoria
		</div>
		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="category_id">Categorias</label>
					<select id="category" name="category_id" class="form-control">
<<<<<<< HEAD
						<option value="" selected disabled hidden>Escolha o Macrotema</option>
=======
						<option value="" selected disabled hidden>Escolha uma...</option>
>>>>>>> feature_auth
						@foreach ($categories as $category)
							@if ($category->category_id_parent == NULL)
								<option value="{{ $category->id }}"> {{ $category->desc }} </option>
							@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
<<<<<<< HEAD
					<label for="desc">Nome Categoria/Subcategoria</label>

					<input class="form-control" type="text" name="desc" placeholder="Nome da categoria/subcategoria" value="{{ old('desc') }}">
=======
					<label for="desc">Nome</label>
					<input class="form-control" type="text" name="desc" placeholder="Nome da categoria/Subcategoria" value="{{ old('desc') }}">
>>>>>>> feature_auth
				</div>
				
				<div class="form-group">
					<div class="text-center">
<<<<<<< HEAD
						<button class="btn btn-success" type="submit">Adicionar</button>
=======
						<button class="btn btn-success" type="submit">Cadastrar</button>
>>>>>>> feature_auth
						<a class="btn btn-success" href="{{ route('categories') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop