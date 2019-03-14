@extends('layouts.admin')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos os Cursos</p>
			
			<a href="{{ route('course.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>

		
		</div>
		<div class="panel-body">
			<table id="coursesTable" class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Autor</th>
					<th>Visualizar</th>
					<th>Aprovar</th>
					<th>Reprovar</th>

				</thead>
				<tbody>
					@if ($courses->count() > 0)
						@foreach ($courses as $course)
						@if($course->avaliable === 0)
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
									{{ $users->find($course->user_id_owner)->name }}
								</td>
								<td>
									<a href="{{ route('course.edit', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>
									<a href="{{ route('course.aprove', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>									
									<a href="{{ route('course.remove', ['id' => $course->id])}} ">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>
								</td>
							</tr>
							@endif
						@endforeach
					@else						
					<tr>
							<td colspan="3" class="text-center">Não existem cursos cadastrados</td>
						</tr>
					@endif
				</tbody>
			</table>
			@if ($courses->count() > 0)
				<form action="{{ route('course.destroy', ['id' => $course->id]) }}" method="GET" class="remove-record-model">
					{{ csrf_field() }}
				    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
				        <div class="modal-dialog" style="width:55%;">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                    <h4 class="modal-title" id="custom-width-modalLabel">Excluir Curso?</h4>
				                </div>
				                <div class="modal-body">
				                    <h4>Você tem certeza que deseja excluir o curso <b>INTEIRO</b> e <b>TODOS</b> seus itens?</h4>
				                </div>
				                <div class="modal-footer">
				                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Fechar</button>
				                    <button type="submit" class="btn btn-danger waves-effect waves-light">Excluir</button>
				                </div>
				            </div>
				        </div>
				    </div>
				</form>
			@endif		
		</div>
	</div>
	
@stop