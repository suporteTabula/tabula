@extends('layouts.app')

@section('content')
	@include('admin.includes.errors')

	@section('styles')
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	@stop

	<div class="panel panel-default">
		<div class="panel-heading">
			Editar capítulo
		</div>
		<div class="panel-body">
			<form action="{{ route('course.chapter.update', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" value="{{ $chapter->name }}" placeholder="Nome do capítulo" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $chapter->desc }}" placeholder="Descrição do capítulo" name="desc">
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.edit', ['id' => $chapter->course_id]) }}">Voltar</a>
					</div>
				</div>
			</form>

			<div class="title_chapter">
				<p style="line-height: 40px;">Aulas/Avaliações</p>

				<button id="create-lesson">Nova Aula</button>

				<button id="create-test">Nova Avaliação</button>
			</div>

			<div id="lesson">
				<form action="{{ route('course.item', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					<div class="form-group">
						<label for="item_type">Tipo da aula</label>
						<select id="item_type" name="item_type_id" class="form-control">
							<option value="" selected disabled hidden>Escolha uma...</option>

							@foreach ($items_type as $item_type)
								@if ($item_type->id <= 4)
									<option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
								@endif 									
							@endforeach
						</select>					
					</div>

					<div class="form-group">
						<label for="name">Nome</label>
						<input class="form-control" type="text" placeholder="Nome da aula" name="name">
					</div>		

					<div id="desc">
						<div class="form-group">
							<label for="desc">Descrição</label>
							<input class="form-control" type="text" placeholder="Descrição da aula" name="desc">
						</div>
					</div>
					
					<div id="arquivo">
						<div class="form-group">
							<label for="desc">Adicionar Arquivo</label>
							<input class="form-control" type="file" name="archive">
						</div>
					</div>

					<div id="texto">
						<div class="form-group">
							<label for="texto">Adicionar Texto</label>
							<textarea id="desc" name="desc" class="form-control" rows="4" cols="5"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Aula</button>
							{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
						</div>
					</div>
				</form>
			</div> 		
			
			<div id="test">
				<form action="{{ route('course.item', ['id' => $chapter->id]) }}"method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="name">Título</label>
						<input class="form-control" type="text" placeholder="Titulo da Questão" name="name">
					</div>				
					
					<div class="form-group">
						<label for="item_type_question">Tipo de avaliação</label>
						<select id="item_type_question" name="item_type_id" class="form-control">
							<option value="" selected disabled hidden>Escolha uma...</option>

							@foreach ($items_type as $item_type)
								@if ($item_type->id > 4)
									<option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
								@endif
							@endforeach
						</select>
					</div>					
					
					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Avaliaçao</button>
							{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
						</div>
					</div>
				</form>
			</div>
			
			<table class="table table-hover">
				<thead>
					<th>Aula/Avaliação</th>
					<th>Descrição</th>
					<th>Tipo</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($items->count() > 0)
						@foreach ($items as $item)
							@if($chapter->id == $item->course_item_group_id && $item->course_items_parent == NULL)
								<tr>
									<td style="vertical-align: middle !important;">
										{{ $item->name }}
									</td>							
									<td style="vertical-align: middle !important;">
										{{ $item->desc }}
									</td>
									<td style="vertical-align: middle !important;">
										{{ $item->course_item_type->name }}
									</td>
									<td>
										<a href="{{ route('course.item.edit', ['id' => $item->id]) }}">
											<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
										</a>
									</td>
									<td>
										<a class="remove-record" data-toggle="modal" data-id={{$item->id}} data-target="#custom-width-modal" data-url="{{ route('course.item.delete', ['id' => $item->id]) }} ">
											<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
										</a>
									</td>									
								</tr>							
							@endif
						@endforeach
					@else						
						<tr>
							<td colspan="3" class="text-center">Não existem aulas/avaliações neste capítulo</td>
						</tr>
					@endif
				</tbody>
			</table>		
			@if ($items->count() > 0)
				<form action="{{ route('course.item.delete', ['id' => $item->id]) }}" method="GET" class="remove-record-model">
					{{ csrf_field() }}
				    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
				        <div class="modal-dialog" style="width:55%;">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                    <h4 class="modal-title" id="custom-width-modalLabel">Excluir Aula/Avaliação?</h4>
				                </div>
				                <div class="modal-body">
				                    <h4>Você tem certeza que deseja excluir? Você perderá todo o conteúdo!</h4>
				                </div>
				                <div class="modal-footer">
				                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
				                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
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
			$( function() {
				var dialogLesson, dialogTest, form,
				name = $( "#name" ),
				desc = $( "#desc" ),
				item_type_id = $( "#item_type" ),
				allFields = $( [] ).add( name ).add( desc ).add( item_type_id ),
				
				dialogLesson = $( "#lesson" ).dialog({
				    autoOpen: false,
				    height: 550,
				    width: 450,
				    modal: true,
				    buttons: {
				        Cancel: function() {
				          	dialogLesson.dialog( "close" );
				        }
				    },
				    close: function() {
				        form[ 0 ].reset();
				        allFields.removeClass( "ui-state-error" );
				    }
				});
				 
				form = dialogLesson.find( "form" ).on( "submit", function( event ) {	

				});
				 
				$( "#create-lesson" ).button().on( "click", function() {
					dialogLesson.dialog( "open" );
				});
				
				dialogTest = $( "#test" ).dialog({
				    autoOpen: false,
				    height: 450,
				    width: 350,
				    modal: true,
				    buttons: {
				        Cancel: function() {
				          	dialogTest.dialog( "close" );
				        }
				    },
				    close: function() {
				        form[ 0 ].reset();
				        allFields.removeClass( "ui-state-error" );
				    }
				});
				 
				form = dialogTest.find( "form" ).on( "submit", function( event ) {				    	
				});
				 
				$( "#create-test" ).button().on( "click", function() {
					dialogTest.dialog( "open" );
				});
			});
		</script>

		<script>
			$('#arquivo').hide();
			$('#texto').hide();
			$('#dissertativa').hide();

			$('#item_type').change(function(){
				if($('#item_type').val() == 3){
					$('#desc').hide();
					$('#texto').show();
					$('#arquivo').hide();
				} else{
					$('#texto').hide();
					$('#desc').show();
					$('#arquivo').show();
				}				
			});

		</script>

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
	@stop
@stop