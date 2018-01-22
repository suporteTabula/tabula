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
				<form action="{{ route('course.item', ['id' => $chapter->id]) }}"method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="name">Nome</label>
						<input class="form-control" type="text" placeholder="Nome da aula" name="name">
					</div>

					<div class="form-group">
						<label for="desc">Descrição</label>
						<input class="form-control" type="text" placeholder="Descrição da aula" name="desc">
					</div>
					
					<div class="form-group">
						<label for="item_type">Tipos</label>
						<select id="item_type" name="item_type_id" class="form-control">
							<option value="" selected disabled hidden>Escolha uma...</option>

							@foreach ($items_type as $item_type)
								@if ($item_type->id <= 4)
									<option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
								@endif 		
								
							@endforeach
						</select>					
					</div>

					<div id="arquivo">
						<div class="form-group">
							<label for="desc">Adicionar Arquivo</label>
							<input class="form-control" type="file" name="arquivo">
						</div>
					</div>

					<div id="texto">
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
			
			<div id="test">
				<form action="{{ route('course.item', ['id' => $chapter->id]) }}"method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="name">Título</label>
						<input class="form-control" type="text" placeholder="Titulo da Questão" name="name">
					</div>				
					
					<div class="form-group">
						<label for="item_type_question">Tipos</label>
						<select id="item_type_question" name="item_type_id" class="form-control">
							<option value="" selected disabled hidden>Escolha uma...</option>

							@foreach ($items_type as $item_type)
								@if ($item_type->id > 4)
									<option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
								@endif
							@endforeach
						</select>
					</div>

					<div id="dissertativa">
						<div class="form-group">
							<label for="desc">Pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição" name="desc">
						</div>
					</div>
					
					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Questão</button>
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
							@if($chapter->id == $item->course_item_group_id)
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
										<a href="{{ route('course.item.delete', ['id' => $item->id]) }} ">
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
					$('#texto').show();
					$('#arquivo').hide();
				} else{
					$('#texto').hide();
					$('#arquivo').show();
				}				
			});

			$('#item_type_question').change(function(){
				if($('#item_type_question').val() == 5){
					$('#dissertativa').show();
				}
				else
				{
					$('#dissertativa').hide();
				}
			});

		</script>
	@stop
@stop