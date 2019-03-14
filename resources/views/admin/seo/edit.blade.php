@extends('layouts.admin')

@section('content')

@include('admin.includes.errors')

<div class="panel panel-default">
	<div class="panel-heading">
		Editar SEO
	</div>
	<div class="panel-body">
		<form action="{{ route('seo.update', ['id' => $seos->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="metaType">Tipo meta</label>
					<select class="form-control" id="metaType" name="metaType">
						<option value="description" <?php if ("description" == $seos->meta_type): echo "selected"; ?>
						<?php endif ?>>Description</option>
						<option value="title" <?php if ("title" == $seos->meta_type): echo "selected"; ?>
						<?php endif ?>>Title</option>
						<option value="keyword" <?php if ("keyword" == $seos->meta_type): echo "selected"; ?>
						<?php endif ?>>Keyword</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xs-12">
					<label for="pageType">Tipo de  página</label>
					<select class="form-control" id="pageType" name="pageType">
						<option value="course" <?php if ("course" == $seos->page_type): echo "selected"; ?>
						<?php endif ?>>Curso</option>
						<option value="category" <?php if ("category" == $seos->page_type): echo "selected"; ?>
						<?php endif ?>>Categoria</option>
						<option value="home" <?php if ("home" == $seos->page_type): echo "selected"; ?>
						<?php endif ?>>Página Inicial</option>
					</select>
				</div>
			</div>
			<div class="form-group row pageCateg">
				<div class="col-xs-12">
					<label for="page">Selecionar página</label>
					<select class="form-control" id="page" name="page">
						@foreach($categories as $category)
						<option value="{{$category->desc}}" <?php if ($category->desc == $seos->page): echo "selected"; ?>
						<?php endif ?>>{{$category->desc}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row pageCourse">
				<div class="col-xs-12">
					<label for="page">Selecionar página</label>
					<select class="form-control" id="page" name="page">
						@foreach($courses as $course)
						<option value="{{$course->name}}" <?php if ($course->name == $seos->page): echo "selected"; ?>
						<?php endif ?>>{{$course->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-12">
					<label for="metaDescription">Descrição Meta</label>
					<input class="form-control" name="metaDescription" type="text" placeholder="Descrição SEO" value="{{ $seos->meta_description}}">
				</div>
			</div>

			



			<div class="text-center">
				<button class="btn btn-success" type="submit">Editar</button>
				<a class="btn btn-success" href="{{ route('seo') }}">Voltar</a>
			</div>

		</form>
	</div>
</div>

@section('scripts')

<script type="text/javascript">
	
	$(document).ready(function(){
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