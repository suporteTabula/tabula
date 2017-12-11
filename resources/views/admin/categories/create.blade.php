@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Adicionar nova Categoria/Subcategoria
		</div>
		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<select id="category" name="category_id" class="form-control">
						<option value="" selected disabled hidden>Escolha o Macrotema</option>
						@foreach ($categories as $category)
							@if ($category->category_id_parent == NULL)
								<option value="{{ $category->id }}"> {{$category->desc}} </option>
							@endif
						@endforeach
					</select>
				</div>


				<div class="form-group">
					<label for="desc">Nome Categoria/Subcategoria</label>

					<input class="form-control" type="text" name="desc" placeholder="Nome da categoria/subcategoria" value="{{ old('desc') }}">
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Adicionar</button>
						<a class="btn btn-success" href="{{ route('categories') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop