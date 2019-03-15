@extends('layouts.admin')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos os Cursos</p>
			
			<a href="{{ route('course.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>

			

			<select id="categories" onchange="Filter()">
				<option value="all">Todos</option>
				@foreach ($categories as $category)
					<option value="{{ $category->desc }}">{{ $category->desc }}</option>
				@endforeach
			</select><br><br>
			<input class="form-control" type="text" id="search" onkeyup="Search()" placeholder="Digite Um Curso..." style="width: 300px;">
		</div>
		<div class="panel-body">
			<table id="coursesTable" class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Autor</th>
					<th>Alunos</th>
					<th>Grupo</th>
					<th>Disponibilizar</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($courses->count() > 0)
						@foreach ($courses as $course)
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
								<td style="vertical-align: middle !important;">
									<a href="{{ route('alunos.teacher', ['id' => $course->id]) }}">Alunos</a>
								</td>
								<td style="vertical-align: middle !important;">
									@if(!$course->group)
										Não tem
									@else
										{{ $course->group }}
									@endif
								</td>
								<td>
									@if($course->avaliable == 1)
									Disponiblizado
									@else
									<a href="{{ route('course.aprove', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
									@endif
								</td>
								<td>
									<a href="{{ route('course.edit', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>									
									<a class="remove-record" data-toggle="modal" data-id={{$course->id}} data-target="#custom-width-modal" data-url="{{ route('course.destroy', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>
								</td>
							</tr>
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

		<script>
			function Search() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("search");
				filter = input.value.toUpperCase();
				table = document.getElementById("coursesTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[3];
					if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}        
				}
			}

			function Filter() {
				var select, option, table, tr, td, i;
				select = document.getElementById("categories");
				option = select.options[select.selectedIndex].value;
				table = document.getElementById("coursesTable");
			  	tr = table.getElementsByTagName("tr");
			  	if(option == 'all'){
			  		for (i = 0; i < tr.length; i++) {
			  			tr[i].style.display = "";
        
			  		}
			  	}
			  	else{
			  		for (i = 0; i < tr.length; i++) {
				  		td = tr[i].getElementsByTagName("td")[2];
				  		if (td) {
				  			if (td.innerHTML.indexOf(option) > -1) {
				  				tr[i].style.display = "";
				  			} else {
				  				tr[i].style.display = "none";
				  			}
				  		}        
			  		}	
			  	}
			  	
			}

		</script>
		<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
	@stop
@stop