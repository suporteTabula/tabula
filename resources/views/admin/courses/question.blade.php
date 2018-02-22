@extends('layouts.admin')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Avaliação
		</div>
		<div class="panel-body">
			<form action="{{ route('course.item.update', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
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
							@if($item_type->id > 4)
								@if($item_type->id >= 5)
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
						<a class="btn btn-success" href="{{ route('course.chapter.edit', ['id' => $item->course_item_group_id]) }}">Voltar</a>
					</div>
				</div>
			</form>	

			@if ($item->course_item_types_id == 6 && is_null($item->course_items_parent))
				<div class="questions">
					<p style="line-height: 40px;">Alternativas</p>

					<button id="create-alt">Adicionar Alternativa</button>
				</div>
				<div id="alt">
					<form action="{{ route('course.alt', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					

						<div class="form-group">
							<label for="desc">Digite a alternativa</label>
							<input class="form-control" type="text" placeholder="Descrição da alternativa" name="desc">
						</div>		
						
						<label for="name">A alternativa é Verdadeira ou Falsa?</label><br>
							<label class="radio-inline"><input type="radio" name="trueFalse" value="1">Verdadeira</label>
							<label class="radio-inline"><input type="radio" name="trueFalse" value="0">Falsa</label>
						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Nova Alternativa</button>
								{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
							</div>
						</div>
					</form>
				</div>

				<table class="table table-hover">
					<thead>
						<th>Alternativa</th>
						<th>Editar</th>
						<th>Deletar</th>
					</thead>
					<tbody>
						@if ($item_options->count() > 0)
							@foreach ($item_options as $item_option)
								@if($item->id == $item_option->course_items_id)
									<tr>
										<td style="vertical-align: middle !important;">
											{{ $item_option->desc }}
										</td>
										<td>
											<a href="{{ route('course.alt.edit', ['id' => $item_option->id]) }}">
												<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
											</a>
										</td>
										<td>
											<a href="{{ route('course.alt.delete', ['id' => $item_option->id]) }} ">
												<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
											</a>
										</td>									
									</tr>							
								@endif
							@endforeach
						@else						
							<tr>
								<td colspan="3" class="text-center">Não existem alternativas nesta pergunta</td>
							</tr>
						@endif
					</tbody>
				</table> 	
			@endif

			@if ($item->course_item_types_id == 5 && is_null($item->course_items_parent))
				<div class="questions">
					<p style="line-height: 40px;">Perguntas</p>

					<button id="create-question">Adicionar Pergunta</button>
				</div>
				<div id="question">
					<form action="{{ route('course.item.child', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					

						<input type="hidden" name="name" value="PerguntaD">
						<input type="hidden" name="item_type_id" value="5">
						<input type="hidden" name="id" value="{{ $item->id }}">

						<div class="form-group">
							<label for="desc">Digite a pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição da pergunta" name="desc">
						</div>
						
						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Pergunta</button>
							{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
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
						@if ($item->course_items_parent == NULL)
							@foreach ($items as $question)
								@if($chapter->id == $question->course_item_group_id && $question->course_items_parent !== NULL && $question->course_items_parent == $item->id)
									<tr>
										<td style="vertical-align: middle !important;">
											{{ $question->desc }}
										</td>
										<td>
											<a href="{{ route('course.item.edit', ['id' => $question->id]) }}">
												<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
											</a>
										</td>
										<td>
											<a href="{{ route('course.item.delete', ['id' => $question->id]) }} ">
												<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
											</a>
										</td>									
									</tr>							
								@endif
							@endforeach
						@else						
							<tr>
								<td colspan="3" class="text-center">Não existem alternativas nesta pergunta</td>
							</tr>
						@endif
					</tbody>
				</table> 	
			@endif

			@if ($item->course_item_types_id == 7 && is_null($item->course_items_parent))
				<div class="questions">
					<p style="line-height: 40px;">Questões</p>

					<button id="create-alt">Adicionar Alternativa</button>
					<button id="create-question">Adicionar Pergunta</button>
				</div>
				<div id="alt">
					<form action="{{ route('course.alt', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					

						<div class="form-group">
							<label for="desc">Digite a alternativa</label>
							<input class="form-control" type="text" placeholder="Descrição da alternativa" name="desc">
						</div>		
							
						<label for="name">A alternativa é Verdadeira ou Falsa?</label><br>
							<label class="radio-inline"><input type="radio" name="trueFalse" value="1">Verdadeira</label>
							<label class="radio-inline"><input type="radio" name="trueFalse" value="0">Falsa</label>
						<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Nova Alternativa</button>
								{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
							</div>
						</div>
					</form>
				</div>

				<div id="question">
					<form action="{{ route('course.item.child', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}					
						<input type="hidden" name="name" value="PerguntaD">
						<input type="hidden" name="item_type_id" value="5">
						<input type="hidden" name="id" value="{{ $item->id }}">

						<div class="form-group">
							<label for="desc">Digite a pergunta</label>
							<input class="form-control" type="text" placeholder="Descrição da pergunta" name="desc">
						</div>
						
						<div class="text-center">
							<button class="btn btn-success" type="submit">Nova Pergunta</button>
							{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
						</div>						
					</form>
				</div>

				<table class="table table-hover">
					<thead>
						<th>Pergunta/Alternativa</th>
						<th>Editar</th>
						<th>Deletar</th>
					</thead>
					<tbody>					
						@if ($item_options->count() > 0 || $item->course_items_parent == NULL)
							@foreach ($item_options as $item_option)
								@if($item->id == $item_option->course_items_id)
									<tr>
										<td style="vertical-align: middle !important;">
											{{ $item_option->desc }}
										</td>
										<td>
											<a href="{{ route('course.alt.edit', ['id' => $item_option->id]) }}">
												<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
											</a>
										</td>
										<td>
											<a href="{{ route('course.alt.delete', ['id' => $item_option->id]) }} ">
												<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
											</a>
										</td>									
									</tr>							
								@endif
							@endforeach					
							@foreach ($items as $question)
								@if($chapter->id == $question->course_item_group_id && $question->course_items_parent !== NULL && $question->course_items_parent == $item->id)
									<tr>
										<td style="vertical-align: middle !important;">
											{{ $question->desc }}
										</td>
										<td>
											<a href="{{ route('course.item.edit', ['id' => $question->id]) }}">
												<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
											</a>
										</td>
										<td>
											<a href="{{ route('course.item.delete', ['id' => $question->id]) }} ">
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
				var dialogAlt, form, dialogQuestion,
				name = $( "#name" ),
				desc = $( "#desc" ),
				trueFalse = $( "#trueFalse" ),

				allFields = $( [] ).add( name ).add( desc ).add( trueFalse ),
				
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
			});
		</script>		
	@stop	
@stop