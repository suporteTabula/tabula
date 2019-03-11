@extends('layouts.admin')

@section('content')

@include('admin.includes.errors')
<div class="panel panel-default">
	<div class="panel-heading">
		Cadastrar nova Categoria/Subcategoria
	</div>
	<div class="panel-body">
		<form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group row">
				<div class="col-xs-12" id="typeCateg">
					<label for="typeCateg">Tipo de Categoria: </label>
					<label class="radio-inline"><input type="radio" name="typeCateg" value="0" >Categoria</label>
					<label class="radio-inline"><input type="radio" name="typeCateg" value="1">Subcategoria</label>
				</div>
			</div>
			<div class="form-group category_id_parent">
				<label for="category_id">Categorias</label>
				<select id="category" name="category_id" class="form-control">
					<option value="" selected disabled hidden>Escolha uma...</option>
					@foreach ($categories as $category)
					@if ($category->category_id_parent == NULL)
					<option value="{{ $category->id }}"> {{ $category->desc }} </option>
					@endif
					@endforeach
				</select>

			</div>
			<div class="form-group">
				<label for="desc">Nome</label>
				<input class="form-control" type="text" name="desc" placeholder="Nome da Categoria/Subcategoria" value="{{ old('desc') }}" required>
			</div>
			<div class="form-group">
				<label for="urn">URN</label>
				<input class="form-control" type="text" name="urn" placeholder="URN para gerar a URL amigável" value="{{ old('urn') }}" required>
			</div>
			<div class="panel-hex">	
				<div class="panel-heading">
					<h4>Apenas para macrotemas</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="desktop_index">Índice Desktop</label>
						<input class="form-control" type="text" name="desktop_index" placeholder="Sugerido: {{ $suggested_index }}" value="{{ old('desktop_index') }}">
					</div>
					<div class="form-group">
						<label for="mobile_index">Índice Mobile</label>
						<input class="form-control" type="text" name="mobile_index" placeholder="Sugerido: {{ $suggested_index }}" value="{{ old('mobile_index') }}">
					</div>
					<div class="form-group">
						<label for="desktop_hex_bg">Hexágono Desktop</label>
						<input class="form-control" type="file" name="desktop_hex_bg">
					</div>
					<div class="form-group">
						<label for="mobile_hex_bg">Hexágono Mobile</label>
						<input class="form-control" type="file" name="mobile_hex_bg">
					</div>
					<div class="form-group">
						<label for="hex_icon">Ícone Hexágono</label>
						<input class="form-control" type="file" name="hex_icon">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Cadastrar</button>
					<a class="btn btn-success" href="{{ route('categories') }}">Voltar</a>
				</div>
			</div>
		</form>
	</div>
</div>

@section('scripts')
<script>

    $('.category_id_parent').hide();
    $('.panel-hex').hide();
    $('#typeCateg').click(function() {
    	var typeCateg =  $( "input[type=radio][name='typeCateg']:checked").val();
    	if (typeCateg == 0) {
    		$('.category_id_parent').hide();
    		$('.panel-hex').show();
    	}else{
    		$('.panel-hex').hide();
    		$('.category_id_parent').show();
    	}

    });

</script>
@stop
@stop