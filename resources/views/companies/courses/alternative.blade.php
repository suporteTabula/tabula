@extends('layouts.companies')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Alternativa
		</div>		
		<div class="panel-body">
			<form action="{{ route('course.alt.update.teacher', ['id' => $alt->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
					
				<div class="form-group">
					<label for="desc">Descrição da Alternativa</label>
					<input class="form-control" type="text" value="{{ $alt->name }}" name="desc">
				</div>			

				<label for="name">A alternativa é Verdadeira ou Falsa?</label><br>
						<input class="form-control" type="text" value="{{ $alt->name }}" name="desc">
						<label class="radio-inline"><input type="radio" name="trueFalse" value="1" @if ($alt->desc == '1') checked @endif>Verdadeira</label>
						<label class="radio-inline"><input type="radio" name="trueFalse" value="0" @if ($alt->desc == '0') checked @endif>Falsa</label>
				<div class="form-group">

					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.item.edit.teacher', ['id' => $alt->course_items_parent]) }}">Voltar</a>
					</div>
				</div>
			</form>			
		</div>
	</div>	
@stop