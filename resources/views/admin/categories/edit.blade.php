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
						<label for="list">Lista de todas Subcategorias</label>
						<ul class="list-group"> 
							@foreach ($category->children as $cat)
								<li class="list-group-item">{{ $cat->desc }}</li>
							@endforeach
						</ul>
					</div>
				@else
					<div class="form-group">
						<label for="category">Categorias</label>
						<select id="category" name="category_id" class="form-control">
							<option value="">Escolha o Macrotema</option>
							@foreach ($categories as $cat)
								@if ($cat->category_id_parent == NULL)
									<option value="{{ $cat->id }}" @if($cat->id == $category->category_id_parent) selected @endif>{{ $cat->desc }}</option>
								@endif
							@endforeach
						</select>
					</div>
				@endif
				<div class="form-group">
					<label for="desc">Nome Categoria/Subcategoria</label>
					<input class="form-control" type="text" placeholder="Nome da categoria/subcategoria" value="{{ $category->desc }}" name="desc">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('categories') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop