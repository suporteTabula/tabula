@extends('layouts.admin')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Adicionar novo SEO
	</div>
	<div class="panel-body">
		<form action="{{ route('seo.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="metaType">Tipo meta</label>
					<select class="form-control" id="metaType" name="metaType">
						<option value="description">Description</option>
						<option value="title">Title</option>
						<option value="eyword">Keyword</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="pageType">Tipo de  página</label>
					<select class="form-control" id="pageType" name="pageType">
						<option value="course">Curso</option>
						<option value="category">Categoria</option>
						<option value="home">Página Inicial</option>
					</select>
				</div>
			</div>
			<div class="form-group row pageCateg">
				<div class="col-xs-12">
					<label for="page">Selecionar página</label>
					<select class="form-control" id="page" name="page">
						
						@foreach($categories as $category)
						<option value="{{$category->desc}}">{{$category->desc}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row pageCourse">
				<div class="col-xs-12">
					<label for="page">Selecionar página</label>
					<select class="form-control" id="page" name="page">
						@foreach($courses as $course)
						<option value="{{$course->name}}">{{$course->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="metaDescription">Descrição Meta</label>
					<input class="form-control" name="metaDescription" type="text" placeholder="Descrição SEO" value="{{ old('metaDescription') }}">
				</div>
			</div>


			<div class="text-center">
				<button class="btn btn-success" type="submit">Adicionar</button>
				<a class="btn btn-success" href="{{ route('seo') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>
@section('scripts')

<script type="text/javascript">
	
	$(document).ready(function(){
		$('.pageCateg').hide();
		$('.pageCourse').hide();

		$('#pageType').change(function(){
			if($('#pageType').val() == 'home'){
				$('.pageCateg').hide();
				$('.pageCourse').hide();
			} else if ($('#pageType').val() == 'category') {
				$('.pageCateg').show();
				$('.pageCourse').hide();
			}else{
				$('.pageCateg').hide();
				$('.pageCourse').show();
			}
		});
	});
</script>
@stop
@stop