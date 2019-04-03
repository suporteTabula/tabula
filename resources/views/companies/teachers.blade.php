@extends('layouts.companies')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading" style="position: relative; height:80x; ">
		<p style="line-height: 40px;">Todos os Professores</p>

		<a href="{{ route('teachers.company.create') }}">
			<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
		</a>
		<div>
			<form method="POST" action="{{route('teachers.company.search')}}">
				 {{ csrf_field() }} 
				<input class="form-control" type="email" name="search"  placeholder="Digite o e-mail do professor" style="width: 300px;">
				<button class="btn">Incluir</button>
				
			</form>

		</div>
	</div>
	<div class="panel-body">
		<table id="coursesTable" class="table table-hover">
			<thead>
				<th>Professor</th>
				<th>E-mail</th>
				<th>Deletar</th>
			</thead>
			<tbody>
				@if ($teachers->count() > 0)
				@foreach ($teachers as $teacher)
				<tr>
					<td style="vertical-align: middle !important;">
						{{ $teacher->name }}
					</td>		
					<td style="vertical-align: middle !important;">
						{{ $teacher->email }}
					</td>					

					<td>									
						<a class="remove-record" data-toggle="modal" data-id={{$teacher->id}} data-target="#custom-width-modal" data-url="{{ route('teachers.company.destroy', ['id' => $teacher->id]) }} ">
							<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
						</a>
					</td>
				</tr>
				@endforeach
				@else						
				<tr>
					<td colspan="3" class="text-center">Não existem Funcionários nesta empresa</td>
				</tr>
				@endif
			</tbody>
		</table>
		@if ($teachers->count() > 0)
		<form action="{{ route('teachers.company.destroy', ['id' => $teacher->id]) }}" method="GET" class="remove-record-model">
			{{ csrf_field() }}
			<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" style="width:55%;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="custom-width-modalLabel">Remover Funcionário?</h4>
						</div>
						<div class="modal-body">
							<h4>Você tem certeza que deseja remover este funcionário de sua empresa?</h4>
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