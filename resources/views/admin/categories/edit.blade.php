@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Categoria/Subcategoria
		</div>
		<div class="panel-body">
			<form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				@if ($category->category_id_parent == NULL)
					<div class="form-group">
						<label for="desc">Lista de todas Subcategorias</label>
						<ul class="list-group"> 
							@foreach ($category->children as $cat)
								<li class="list-group-item">{{ $cat->desc }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class="form-group">
					<label for="desc">Nome Categoria/Subcategoria</label>
					<input class="form-control" type="text" value="{{ $category->desc }}" name="desc">
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