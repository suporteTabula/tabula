@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos os Cursos</p>
			
			<a href="{{ route('course.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Autor</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($courses->count() > 0)
						@foreach ($courses as $course)
							<tr>
								<td style="vertical-align: middle !important;">
									{{ $course->name }}
								</td>							
								<td style="vertical-align: middle !important;">
									{{ $course->desc }}
								</td>
								<td style="vertical-align: middle !important;">
									{{ $course->category->desc }}
								</td>
								<td style="vertical-align: middle !important;">
									{{ $users->find($course->user_id_owner)->first_name }}
								</td>
								<td>
									<a href="{{ route('course.edit', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>									
									<a href="{{ route('course.destroy', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>
								</td>
							</tr>
						@endforeach
					@else						
					<tr>
							<td colspan="3" class="text-center">Não existem cursos cadastrados</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	
@stop