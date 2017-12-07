@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Usuários</p>
			
			<a href="{{ route('user.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>

			<input class="form-control" type="text" id="search" onkeyup="Search()" placeholder="Digite um nome de usuário..." style="width: 300px;">

			<select id="usersType" onchange="Filter()">
				<option value="0">Tipo de usuário</option>
				@foreach ($usersType as $userType)
					<option value="{{ $userType->desc }}">{{ $userType->desc }}</option>
				@endforeach
			</select>

		</div>
		<div class="panel-body">
			<table class="table table-hover" id="userTable">
				<thead>
					<th>Login</th>
					<th>Nome Completo</th>
					<th>E-mail</th>
					<th>Tipo de Usário</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($users->count() > 0)
						@foreach ($users as $user)
							<tr>
								<td style="vertical-align: middle !important;">{{ $user->login }}</td>
								<td style="vertical-align: middle !important;">{{ $user->first_name. ' ' .$user->last_name}}</td>
								<td style="vertical-align: middle !important;">{{ $user->email }}</td>
								<td style="vertical-align: middle !important;">
									@foreach ($user->userTypes as $userType)
										{{$userType->desc}}
									@endforeach 
								</td>
								<td>
									<a href="{{ route('user.edit', ['id' => $user->id]) }}">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>
									@if(Auth::id() !== $user->id)
										<a href="{{ route('user.delete', ['id' => $user->id]) }} ">
											<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
										</a>
									@endif
								</td>
							</tr>
						@endforeach
					@else						
						<tr>
							<td colspan="4" class="text-center">Sem usuários</td>
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
				table = document.getElementById("userTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[1];
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
				select = document.getElementById("usersType");
				option = select.options[select.selectedIndex].value;
				table = document.getElementById("userTable");
			  	tr = table.getElementsByTagName("tr");
			  	for (i = 0; i < tr.length; i++) {
			  		td = tr[i].getElementsByTagName("td")[3];
			  		if (td) {
			  			if (td.innerHTML.indexOf(option) > -1) {
			  				tr[i].style.display = "";
			  			} else {
			  				tr[i].style.display = "none";
			  			}
			  		}        
			  	}
			}
		</script>
	@stop
@stop