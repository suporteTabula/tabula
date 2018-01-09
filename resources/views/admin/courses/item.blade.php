@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Aula/Avaliação
		</div>
		<div class="panel-body">
			<form action="{{ route('course.item.update', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" value="{{ $item->name }}" placeholder="Nome do capítulo" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $item->desc }}" placeholder="Descrição do capítulo" name="desc">
				</div>

				<div class="form-group">
						<label for="item_type">Tipos</label>
						<select id="item_type" name="item_type_id" class="form-control">
							<option value="" selected disabled hidden>Escolha uma...</option>
							@foreach ($items_type as $item_type)

								<option value="{{ $item_type->id }}" 
									@if ($item_type->id == $item->course_item_types_id)
										selected
									@endif
									>{{ $item_type->name }}
								</option>

							@endforeach
						</select>
					</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.chapter.edit', ['id' => $item->course_item_group_id]) }}">Voltar</a>
					</div>
				</div>
			</form>			
		</div>
	</div>	
@stop