@extends('layouts.admin')

@section('content')

@include('admin.includes.errors')
<div class="panel panel-default">
	<div class="panel-heading">
		Editar Dissertativa
	</div>		
	<div class="panel-body">
		<form action="{{ route('course.diss.update', ['id' => $diss->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="desc">Descrição da Dissertativa</label>
				<input class="form-control" type="text" value="{{ $diss->desc }}" name="desc">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Salvar</button>
					<a class="btn btn-success" href="{{ route('course.item.edit', ['id' => $diss->course_items_parent]) }}">Voltar</a>
				</div>
			</div>
		</form>			
	</div>
</div>	
@stop