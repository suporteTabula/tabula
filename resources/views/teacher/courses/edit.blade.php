@extends('layouts.teacher')

@section('content')

@include('admin.includes.errors')
<div class="panel panel-default">
	<div class="panel-heading">
		Editar curso
	</div>
	<div class="panel-body">
		<form action="{{ route('course.update.teacher', ['id' => $course->id]) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Nome</label>
				<input class="form-control" type="text" value="{{ $course->name }}" placeholder="Nome do curso" name="name">
			</div>
			<div class="form-group">
				<label for="desc">Descrição</label>
				<input class="form-control" type="text" value="{{ $course->desc }}" placeholder="Descrição do curso" name="desc">
			</div>
			<div class="form-group">
				<label for="category_id">Categoria</label>
				<select class="form-control" id="category_id" name="category_id">
					<option value="" selected disabled hidden>Escolha uma...</option>
					@foreach($categories as $category)
					<option value="{{ $category->id }}"
						@if($course->category->id == $category->id)
						selected
						@endif
						>{{ $category->desc }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="hidden" name="featured" value="{{$course->featured}}">
				</div>
				<div class="form-group">
					<label for="price">Preço</label>
					<input class="form-control" type="text" value="{{ $course->price }}" name="price" placeholder="Preço do curso">
				</div>
				<div class="form-group">
					<label for="requirements">Requisitos</label>
					<textarea class="form-control" name="requirements" placeholder="Requisitos para o Curso">{{ $course->requirements }}</textarea>
				</div>
				<div class="form-group row">
					<div class="col-xs-4">
						<label for="group">Grupo</label>
						@foreach ($user_groups as $user_group)
						<label class="checkbox-inline"><input type="checkbox" name="group[]" value="{{ $user_group->id }}" 
							@foreach ($course->userGroups as $group)
							@if ($group->id == $user_group->id)
							checked
							@endif
							@endforeach
							> {{ $user_group->desc }}</label>
							@endforeach
						</div>
					</div>
					<div class="form-group">
						<label for="thumb_img">Imagem da Vitrine</label>
						<input class="form-control" type="file" name="thumb_img">
					</div>
					<div class="form-group">
						<label for="video">Video de Apresentação do Curso</label>
						<input class="form-control" type="file" name="video">
					</div>
					{{--  <div class="form-group">
						<label for="course_item_type">Selecione o tipo de arquivo</label>
						<select class="form-control" id="item_type_id" name="item_type_id">
							<option value="" selected disabled hidden>Escolha uma...</option>
							@foreach($course_item_types as $item_type)
							<option value="{{ $item_type->id }}"> {{ $item_type->name }}</option>
							@endforeach
						</select>
					</div > --}}
					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">Salvar</button>
							<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>
						</div>
					</div>
				</form>

				<div class="title_chapter">
					<p style="line-height: 40px;">Capítulos</p>

					<button id="create-chapter">Novo Cap.</button>
				</div>

				<div id="chapter">
					<form action="{{ route('course.chapter.teacher', ['id' => $course->id]) }}"method="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="name">Nome</label>
							<input class="form-control" type="text" placeholder="Nome do capítulo" name="name">
						</div>

						<div class="form-group">
							<label for="desc">Descrição</label>
							<input class="form-control" type="text" placeholder="Descrição do capítulo" name="desc">
						</div>
						
						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Salvar</button>
								{{--<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>--}}
							</div>
						</div>
					</form>
				</div>

				<table class="table table-hover">
					<thead>
						<th>Capítulo</th>
						<th>Descrição</th>
						<th>Editar</th>
						<th>Deletar</th>
					</thead>
					<tbody>
						@if ($course_items_group->count() > 0)
						@foreach ($course_items_group as $course_item_group)
						@if($course->id == $course_item_group->course_id)
						<tr>
							<td style="vertical-align: middle !important;">
								{{ $course_item_group->name }}
							</td>							
							<td style="vertical-align: middle !important;">
								{{ $course_item_group->desc }}
							</td>									
							<td>
								<a href="{{ route('course.chapter.edit.teacher', ['id' => $course_item_group->id]) }}">
									<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
								</a>
							</td>
							<td>
								<a class="remove-record" data-toggle="modal" data-id="{{$course_item_group->id}}" data-target="#custom-width-modal" data-url="{{ route('course.chapter.delete.teacher', ['id' => $course_item_group->id]) }}">
									<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
								</a>
							</td>										
						</tr>							
						@endif
						@endforeach						
						@else						
						<tr>
							<td colspan="3" class="text-center">Não existem capítulos neste curso</td>
						</tr>
						@endif
					</tbody>
				</table>
				@if ($course_items_group->count() > 0)
				<form action="{{ route('course.chapter.delete.teacher', ['id' => $course_item_group->id]) }}" method="GET" class="remove-record-model">
					{{ csrf_field() }}
					<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
						<div class="modal-dialog" style="width:55%;">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title" id="custom-width-modalLabel">Excluir Capítulo?</h4>
								</div>
								<div class="modal-body">
									<h4>Você tem certeza que deseja excluir o capítulo e <b>TODOS</b> seus itens?</h4>
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
			$( function() {
				var dialog, form,
				name = $( "#name" ),
				desc = $( "#desc" ),
				allFields = $( [] ).add( name ).add( desc ),
				
				dialog = $( "#chapter" ).dialog({
					autoOpen: false,
					height: 400,
					width: 350,
					modal: true,
					buttons: {
						Cancel: function() {
							dialog.dialog( "close" );
						}
					},
					close: function() {
						form[ 0 ].reset();
						allFields.removeClass( "ui-state-error" );
					}
				});

				form = dialog.find( "form" ).on( "submit", function( event ) {

				});

				$( "#create-chapter" ).button().on( "click", function() {
					dialog.dialog( "open" );
				});
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