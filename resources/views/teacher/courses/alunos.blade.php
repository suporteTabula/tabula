@extends('layouts.teacher')

@section('content')
	<div class="panel panel-default">
		
		<div class="panel-body">
			<table id="coursesTable" class="table table-hover">
				<thead>
					<th>Aluno</th>
					<th>Progresso</th>
					<th>Gerar Certificado</th>
					<th>Reiniciar</th>
				</thead>
				<tbody>
					@if ($alunos->count() > 0)
						@foreach ($alunos as $aluno)
							<tr>
								<td style="vertical-align: middle !important;">
									{{ $aluno->dados->name }}
								</td>							
								<td style="vertical-align: middle !important;">
									{{ $aluno->progress }}%
								</td>
								<td>
									<a href="{{route('certificate.teacher', ['id' => $aluno->id])}}">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
					
								<td>
									<a href="{{route('alunos.reset.teacher', ['id' => $aluno->id])}}">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
							</tr>
						@endforeach
					@else						
					<tr>
							<td colspan="3" class="text-center">Não existem Alunos cadastrados</td>
						</tr>
					@endif
				</tbody>
			</table>
			@if ($alunos->count() > 0)
				<form action="{{ route('course.destroy.teacher', ['id' => $aluno->id]) }}" method="GET" class="remove-record-model">
					{{ csrf_field() }}
				    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
				        <div class="modal-dialog" style="width:55%;">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                    <h4 class="modal-title" id="custom-width-modalLabel">Remover Aluno?</h4>
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
	@section('scripts')
		<script>
			$(document).ready(function(){
			// For A Delete Record Popup
				$('.remove-record').click(function() {
					var id = $(this).attr('data-id');
					var d = $(this).attr('data-url');
					
					$(".remove-record-model").attr('action',d);
					
					$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
					$('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
				});

				$('.remove-data-from-delete-form').click(function() {
					$('body').find('.remove-record-model').find( "input" ).remove();
				});		
				$('.modal').click(function() {
					// $('body').find('.remove-record-model').find( "input" ).remove();
				});		
			});
		</script>

		<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
	@stop
@stop