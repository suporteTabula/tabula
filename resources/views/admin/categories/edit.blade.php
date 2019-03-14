@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Categoria/Subcategoria
		</div>
		<div class="panel-body">
			<form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="desc">Nome Categoria/Subcategoria</label>
					<input class="form-control" type="text" placeholder="Nome da categoria/subcategoria" value="{{ $category->desc }}" name="desc" required>
				</div>
				<div class="form-group">
					<label for="urn">URN</label>
					<input class="form-control" type="text" placeholder="URN para gerar a URL amigável" value="{{ $category->urn }}" name="urn" required>
				</div>
				@if ($category->category_id_parent == NULL)
					<div class="form-group">
						<label for="list">Lista de todas Subcategorias</label>
						<ul class="list-group"> 
							@foreach ($category->children as $cat)
								<li class="list-group-item">{{ $cat->desc }}</li>
							@endforeach
						</ul>
					</div>
					<div class="form-group">
						<label for="desktop_index">Índice Desktop</label>
						<input class="form-control" type="text" name="desktop_index" value="{{ $category->desktop_index }}">
					</div>
					<div class="form-group">
						<label for="mobile_index">Índice Mobile</label>
						<input class="form-control" type="text" name="mobile_index" value="{{ $category->mobile_index }}">
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
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
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
    		$('.panel-hex').hide();
    	}else{
    		$('.category_id_parent').show();
    		$('.panel-hex').show();
    	}

    });

</script>
@stop
@stop