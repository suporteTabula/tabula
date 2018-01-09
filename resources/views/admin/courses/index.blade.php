@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos os Cursos</p>
			
			<a href="{{ route('course.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>

			<input class="form-control" type="text" id="search" onkeyup="Search()" placeholder="Digite um nome de usuário..." style="width: 300px;">

			<select id="categories" onchange="Filter()">
				<option value="all">Todos</option>
				@foreach ($categories as $category)
					<option value="{{ $category->desc }}">{{ $category->desc }}</option>
				@endforeach
			</select>

		</div>
		<div class="panel-body">
			<table id="coursesTable" class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Categoria</th>
					<th>Autor</th>
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
									{{ $users->find($course->user_id_owner)->first_name }}
								</td>
								<td>
									<a href="{{ route('course.edit', ['id' => $course->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>									
									<a href="{{ route('course.destroy', ['id' => $course->id]) }} ">
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
		</div>
	</div>
	@section('scripts')
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
	@stop
@stop