@extends('layouts.teacher')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Avaliação
		</div>
		<div class="panel-body">
			<form action="{{ route('course.item.update.teacher', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Título da Avaliação</label>
					<input class="form-control" type="text" value="{{ $item->name }}" placeholder="Titulo da avaliação" name="name">
				</div>

				<div class="form-group">
					<label for="item_type">Tipo de avaliação</label>
					<select id="item_type" name="item_type_id" class="form-control">
						<option value="" selected disabled hidden>Escolha uma...</option>
						@foreach ($items_type as $item_type)
							@if($item_type->id > 5)
								@if($item_type->id >= 6)
									<option value="{{ $item_type->id }}" 
										@if ($item_type->id == $item->course_item_types_id)
											selected
										@endif
										>{{ $item_type->name }}
									</option>
								@endif
							@endif
						@endforeach
					</select>
				</div>

				@if ($item->course_items_parent !== NULL)
					<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $item->desc }}" placeholder="Titulo da avaliação" name="desc">
				</div>
				@endif			

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.chapter.edit.teacher', ['id' => $item->course_item_group_id]) }}">Voltar</a>
					</div>
				</div>
			</form>

			@if ($item->course_item_types_id == 7 && is_null($item->course_items_parent))
				<div class="questions">
					<p style="line-height: 40px;">Questões</p>

					<button id="create-alt">Adicionar V/F</button>
					<button id="create-question">Adicionar Dissertativa</button>
					<button id="create-multiple">Adicionar Multipla</button>
					<button id="create-single">Adicionar Alternativas</button>
				</div>
				<div id="alt">
					<form action="{{ route('course.alt.teacher', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}				

						<input type="hidden" name="item_type_id" value="8">
						<input type="hidden" name="id" value="{{ $item->id }}">

						<div class="form-group">
							<label for="desc">Digite a pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição da alternativa" name="desc">
						</div>		
							
						<label for="name">A pergunta é Verdadeira ou Falsa?</label><br>
							<label class="radio-inline"><input type="radio" name="trueFalse" value="1">Verdadeira</label>
							<label class="radio-inline"><input type="radio" name="trueFalse" value="0">Falsa</label>
						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Nova Pergunta</button>
								{{--<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>--}}
							</div>
						</div>
					</form>
				</div>

				<div id="question">
					<form action="{{ route('course.item.child.teacher', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					
						<input type="hidden" name="name" value="PerguntaD">
						<input type="hidden" name="item_type_id" value="10">
						<input type="hidden" name="id" value="{{ $item->id }}">

						<div class="form-group">
							<label for="desc">Digite a pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição da pergunta" name="desc">
						</div>
						
						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Pergunta</button>
							{{--<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>--}}
						</div>						
					</form>
				</div>

				<div id="multiple">
					<form action="{{ route('course.multiple.teacher', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					
						<input type="hidden" name="name" value="PerguntaM">
						<input type="hidden" name="item_type_id" value="6">

						<div class="form-group">
							<label for="desc">Digite a pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição da pergunta" name="desc">
						</div>

						<div class="form-group">
							<label>Digite as alternativas e marque as verdadeiras</label>
							<input type="checkbox" name="verdadeira_0" value="1">
							<input type="text" name="afirmacao[]"  placeholder="Digite a afirmação"><br>
							<input type="checkbox" name="verdadeira_1" value="1">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
							<input type="checkbox" name="verdadeira_2" value="1">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
							<input type="checkbox" name="verdadeira_3" value="1">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
							<input type="checkbox" name="verdadeira_4" value="1">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
						</div>

						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Pergunta</button>
							{{--<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>--}}
						</div>						
					</form>
				</div>

				<div id="single">
					<form action="{{ route('course.multiple.teacher', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					
						<input type="hidden" name="name" value="PerguntaAl">
						<input type="hidden" name="item_type_id" value="9">

						<div class="form-group">
							<label for="desc">Digite a pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição da pergunta" name="desc">
						</div>

						<div class="form-group">
							<label>Digite as alternativas e marque somente a verdadeira</label>
							<input type="radio" name="verdadeira" value="0">
							<input type="text" name="afirmacao[]"  placeholder="Digite a afirmação"><br>
							<input type="radio" name="verdadeira" value="1">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
							<input type="radio" name="verdadeira" value="2">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
							<input type="radio" name="verdadeira" value="3">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
							<input type="radio" name="verdadeira" value="4">
							<input type="text" name="afirmacao[]" placeholder="Digite a afirmação"><br>
						</div>

						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Pergunta</button>
							{{--<a class="btn btn-success" href="{{ route('courses.teacher') }}">Voltar</a>--}}
						</div>						
					</form>
				</div>

				<table class="table table-hover">
					<thead>
						<th>Pergunta</th>
						<th>Editar</th>
						<th>Deletar</th>
					</thead>
					<tbody>					
						@if ($item->count() > 0 || $item->course_items_parent == NULL)				
							@foreach ($items as $question)
								@if($chapter->id == $question->course_item_group_id && $question->course_items_parent !== NULL && $question->course_items_parent == $item->id)
									<tr>
										<td style="vertical-align: middle !important;">
											@if ($question->course_item_types_id == 10)
												{{ $question->desc }}
											@else
												{{ $question->name }}
											@endif
										</td>
										<td>
											@if ($question->course_item_types_id == 10)
												<a href="{{ route('course.item.edit.teacher', ['id' => $question->id]) }}">
													<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
												</a>
											@elseif ($question->course_item_types_id == 8)
												<a href="{{ route('course.alt.edit.teacher', ['id' => $question->id]) }}">
													<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
												</a>
											@endif
										</td>
										<td>
											<a href="{{ route('course.item.delete.teacher', ['id' => $question->id]) }} ">
												<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
											</a>
										</td>									
									</tr>							
								@endif
							@endforeach
						@endif
					</tbody>
				</table> 
			@endif	
		</div>
	</div>

	@section('scripts')
		<script>
			$( function() {
				var dialogAlt, form, dialogQuestion, dialogMultiple, dialogSingle,
				name = $( "#name" ),
				desc = $( "#desc" ),
				verdadeira = $( "#verdadeira"),
				afirmacao = $( "#afirmacao"),
				trueFalse = $( "#trueFalse" ),

				allFields = $( [] ).add( name ).add( desc ).add( trueFalse ).add( verdadeira ).add( afirmacao ),
				
				dialogAlt = $( "#alt" ).dialog({
				    autoOpen: false,
				    height: 450,
				    width: 350,
				    modal: true,
				    buttons: {
				        Cancel: function() {
				          	dialogAlt.dialog( "close" );
				        }
				    },
				    close: function() {
				        form[ 0 ].reset();
				        allFields.removeClass( "ui-state-error" );
				    }
				});
				 
				form = dialogAlt.find( "form" ).on( "submit", function( event ) {	

				});
				 
				$( "#create-alt" ).button().on( "click", function() {
					dialogAlt.dialog( "open" );
				});	

				dialogQuestion = $( "#question" ).dialog({
				    autoOpen: false,
				    height: 450,
				    width: 350,
				    modal: true,
				    buttons: {
				        Cancel: function() {
				          	dialogQuestion.dialog( "close" );
				        }
				    },
				    close: function() {
				        form[ 0 ].reset();
				        allFields.removeClass( "ui-state-error" );
				    }
				});
				 
				form = dialogQuestion.find( "form" ).on( "submit", function( event ) {	

				});
				 
				$( "#create-question" ).button().on( "click", function() {
					dialogQuestion.dialog( "open" );
				});	

				dialogMultiple = $( "#multiple" ).dialog({
				    autoOpen: false,
				    height: 450,
				    width: 350,
				    modal: true,
				    buttons: {
				        Cancel: function() {
				          	dialogMultiple.dialog( "close" );
				        }
				    },
				    close: function() {
				        form[ 0 ].reset();
				        allFields.removeClass( "ui-state-error" );
				    }
				});
				 
				form = dialogMultiple.find( "form" ).on( "submit", function( event ) {	

				});
				 
				$( "#create-multiple" ).button().on( "click", function() {
					dialogMultiple.dialog( "open" );
				});

				dialogSingle = $( "#single" ).dialog({
				    autoOpen: false,
				    height: 450,
				    width: 350,
				    modal: true,
				    buttons: {
				        Cancel: function() {
				          	dialogSingle.dialog( "close" );
				        }
				    },
				    close: function() {
				        form[ 0 ].reset();
				        allFields.removeClass( "ui-state-error" );
				    }
				});
				 
				form = dialogSingle.find( "form" ).on( "submit", function( event ) {	

				});
				 
				$( "#create-single" ).button().on( "click", function() {
					dialogSingle.dialog( "open" );
				});				
			});
		</script>		
	@stop	
@stop