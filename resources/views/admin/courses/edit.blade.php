@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar curso
		</div>
		<div class="panel-body">
			<form action="{{ route('course.update', ['id' => $course->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" value="{{ $course->name }}" placeholder="Nome do curso" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $course->desc }}" placeholder="Descrição do curso" name="desc">
				</div>
				<div class="form-group">
					<label for="category_id">Categoria</label>
					<select class="form-control" id="category_id" name="category_id">
						<option value="" selected disabled hidden>Escolha uma...</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}"
							@if($course->category->id == $category->id)
								selected
							@endif
							>{{ $category->desc }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop