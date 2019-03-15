@extends('layouts.teacher')

@section('content')

@include('admin.includes.errors')
<div class="panel panel-default">
	<div class="panel-heading">
		Cadastrar novo curso
	</div>
	<div class="panel-body">
		<form action="{{ route('course.store.teacher') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Nome</label>
				<input class="form-control" type="text" name="name" placeholder="Nome do curso" value="{{ old('name') }}">
			</div>
			<div class="form-group">
				<label for="desc">Descrição</label>
				<input class="form-control" type="text" name="desc" placeholder="Descrição do curso" value="{{ old('desc') }}">
			</div>
			<div class="form-group" id="categ">
				<label for="category_id">Categoria</label>
				<select class="form-control" id="category_id" name="category_id">
					<option value="" selected disabled hidden>Escolha uma...</option>
					@foreach($categories as $category)
					@if($category->category_id_parent == NULL)
					<option value="{{ $category->id }}">{{ $category->desc }}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group" id="subCateg">
				<label for="subcategory_id">Subcategoria</label>
				<select class="form-control" id="subcategory_id" name="subcategory_id">
					<option value="" selected disabled hidden>Escolha uma...</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}" >{{ $category->desc }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="featured">Destaque</label>
				<select class="form-control" id="featured" name="featured">
					<option value="0">Não</option>
					<option value="1">Sim</option>
				</select>
			</div>
			<div class="form-group">
				<label for="price">Preço</label>
				<input class="form-control input-price" type="text" name="price" placeholder="Preço do curso" value="{{ old('price') }}">
			</div>
			<div class="form-group">
				<label for="requirements">Requisitos</label>
				<textarea class="form-control" name="requirements" placeholder="Requisitos para o Curso"></textarea>
			</div>
			<div class="form-group row">
				<div class="col-xs-4">
					<label for="group">Grupo</label>
					@foreach ($user_groups as $user_group)
					<label class="checkbox-inline"><input type="checkbox" name="group[]" value="{{ $user_group->id }}"> {{ $user_group->desc }} </label>
					@endforeach
				</div>
			</div>

			<div class="form-group">
				<label for="thumb_img">Imagem da Vitrine</label>
				<input class="form-control" type="file" name="thumb_img">
			</div>
			<div class="form-group">
				<label for="video">Video de Apresentação do Curso</label>
				<input class="form-control" type="file" name="video">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Criar</button>
					<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>
				</div>
			</div>
		</form>
	</div>
</div>
@section('scripts')
<script>
	var category_id = 0;
    $('#subCateg').hide();
    $('#categ' ).change(function() {
    	var url = "{{route('sub.categ')}}";
    	var categId = $('#categ option:selected').val();
    	categAjax(url, categId);
    	$('#subCateg').show();
    });

    function categAjax(url, categId){
        $.ajax({
            type: 'GET',
            url: url,
            data:{
                categId: categId,
            },
            beforeSend: function(){
            },
            success: function(data){
                var result = $.parseJSON(data);
                console.log(result);
                
            }
        });
    }

</script>
@stop
@stop