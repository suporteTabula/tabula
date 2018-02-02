@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Alternativa
		</div>
		<div class="panel-body">
			<form action="{{ route('course.alt.update', ['id' => $alt->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="form-group">
					<label for="desc">Descrição da Alternativa</label>
					<input class="form-control" type="text" value="{{ $alt->desc }}" name="desc">
				</div>			

				<label for="name">A alternativa é Verdadeira ou Falsa?</label><br>
						<label class="radio-inline"><input type="radio" name="trueFalse" value="1" @if ($alt->checked == '1') checked @endif>Verdadeira</label>
						<label class="radio-inline"><input type="radio" name="trueFalse" value="0" @if ($alt->checked == '0') checked @endif>Falsa</label>
				<div class="form-group">

					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.item.edit', ['id' => $alt->course_items_id]) }}">Voltar</a>
					</div>
				</div>
			</form>			
		</div>
	</div>	
@stop