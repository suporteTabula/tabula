@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar curso
		</div>
		<div class="panel-body">
			<form action="{{ route('course.update', ['id' => $course->id]) }}" method="post" enctype="multipart/form-data">
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
						<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>
					</div>
				</div>
			</form>

			<div class="title_chapter">
				<p style="line-height: 40px;">Capítulos</p>

				<button id="create-chapter">Novo Cap.</button>
			</div>

			<div id="chapter">
				<form action="{{ route('course.chapter', ['id' => $course->id]) }}"method="post" enctype="multipart/form-data">
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
							{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
						</div>
					</div>
				</form>
			</div>
				
			
			<table class="table table-hover">
				<thead>
					<th>Capítulo</th>
					<th>Descrição</th>
					<th>Aulas/Avaliações</th>
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
										@foreach ($ as $element)
											{{-- expr --}}
										@endforeach
									</td>
									<td>
										<a href="{{ route('course.chapter.edit', ['id' => $course_item_group->id]) }}">
											<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
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
	@stop
@stop