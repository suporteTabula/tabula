@extends('layouts.admin')

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
					<label for="item_type">Tipo de Aula</label>
					<select id="item_type" name="item_type_id" class="form-control">
						<option value="" selected disabled hidden>Escolha uma...</option>
						@foreach ($items_type as $item_type)
							@if($item_type->id < 5)
							<option value="{{ $item_type->id }}" 
								@if ($item_type->id == $item->course_item_types_id)
									selected
								@endif
								>{{ $item_type->name }}
							</option>
							@endif
						@endforeach
					</select>
				</div>	

				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" value="{{ $item->name }}" placeholder="Nome" name="name">
				</div>

				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $item->desc }}" placeholder="Descrição da questão" name="desc">
				</div>				

				<div id="arquivo">
					<div class="form-group">
						<label for="desc">Adicionar Arquivo</label>
						<input class="form-control" type="file" name="archive">
					</div>
				</div>	

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.chapter.edit', ['id' => $item->course_item_group_id]) }}">Voltar</a>
					</div>
				</div>
			</form>	

			@if($item->course_items_parent == NULL)
				<div class="title_chapter">
					<p style="line-height: 40px;">Aulas</p>

					<button id="create-lesson">Nova Aula</button>
				</div>

				<div id="lesson">
					<form action="{{ route('course.item.child', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
						<label for="i_type">Tipo da aula</label>
							<select id="i_type" name="item_type_id" class="form-control">
								<option value="" selected disabled hidden>Escolha uma...</option>

								@foreach ($items_type as $item_type)
									@if ($item_type->id <= 4)
										<option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
									@endif 									
								@endforeach
							</select>					
						</div>
						
						<input class="form-control" type="hidden" name="id" value="{{ $item->id }}">

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

						<div id="arq">
							<div class="form-group">
								<label for="desc">Adicionar Arquivo</label>
								<input class="form-control" type="file" name="archive">
							</div>
						</div>

						<div id="text">
							<div class="form-group">
								<label for="texto">Adicionar Texto</label>
								<textarea id="texto" name="texto" class="form-control" rows="4" cols="5"></textarea>
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
				
				<table class="table table-hover">
					<thead>
						<th>Aula</th>
						<th>Descrição</th>
						<th>Tipo</th>
						<th>Editar</th>
						<th>Deletar</th>
					</thead>
					<tbody>
						@if ($item->course_items_parent == NULL)
							@foreach ($items as $item_child)
								@if($chapter->id == $item_child->course_item_group_id && $item_child->course_items_parent !== NULL && $item_child->course_items_parent == $item->id)
									<tr>
										<td style="vertical-align: middle !important;">
											{{ $item_child->name }}
										</td>							
										<td style="vertical-align: middle !important;">
											{{ $item_child->desc }}
										</td>
										<td style="vertical-align: middle !important;">
											{{ $item_child->course_item_type->name }}
										</td>
										<td>
											<a href="{{ route('course.item.edit', ['id' => $item_child->id]) }}">
												<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
											</a>
										</td>
										<td>
											<a class="remove-record" data-toggle="modal" data-id={{$item_child->id}} data-target="#custom-width-modal" data-url="{{ route('course.item.delete', ['id' => $item_child->id]) }} ">
												<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
											</a>
										</td>									
									</tr>							
								@endif
							@endforeach
						@else						
							<tr>
								<td colspan="3" class="text-center">Não existem perguntas nesta prova</td>
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
			@endif
		</div>
	</div>
	@section('scripts')
		<script>
			$( function() {
				var dialogLesson, form,
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
			});
		</script>

		<script>
			$('#arq').hide();			
			$('#text').hide();

			$('#i_type').change(function(){
				if($('#i_type').val() == 3){
					$('#text').show();
					$('#desc').hide();
					$('#arq').hide();
				} else{
					$('#text').hide();
					$('#desc').show();					
					$('#arq').show();
				}				
			});

			$(document).ready(function(){
				if($('#item_type').val() == 3){
					$('#arquivo').hide();

					$('#item_type').change(function(){
					if($('#item_type').val() == 3){
						$('#arquivo').hide();
					} else{				
						$('#arquivo').show();
					}				
				});
				} else{				
					$('#arquivo').show();
					$('#item_type').change(function(){
					if($('#item_type').val() == 3){
						$('#arquivo').hide();
					} else{				
						$('#arquivo').show();
					}
				});
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