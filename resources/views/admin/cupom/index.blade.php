@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading" style="position: relative; height:80x; ">
		<p style="line-height: 40px;">Todos os Cupons</p>
		
		<a href="{{ route('cupom.create') }}">
			<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
		</a>


	</div>
	<div class="panel-body">
		<table class="table table-hover" id="userTable">
			<thead>
				<th>Código</th>
				<th>Tipo de Cupom</th>
				<th>Valor do Cupom</th>
				<th>Descrição</th>
				<th>ID do Produto</th>
				<th>Uso/Limite</th>
				<th>Validade</th>
				<th>Editar</th>
				<th>Deletar</th>
			</thead>
			<tbody>
				@if ($cupoms->count() > 0)
				@foreach ($cupoms as $cupom)
				<tr>
					<td style="vertical-align: middle !important;">{{ $cupom->codCupom}}</td>
					<td style="vertical-align: middle !important;">{{ $cupom->tipoCupom}}</td>
					<td style="vertical-align: middle !important;">{{ $cupom->valorCupom}}</td>
					<td style="vertical-align: middle !important;">{{ $cupom->descCupom}}</td>
					<td style="vertical-align: middle !important;">{{ $cupom->curso_id}}</td>
					<td style="vertical-align: middle !important;">{{ $cupom->limiteCupom}}</td>
					<td style="vertical-align: middle !important;">{{ $cupom->expiraCupom}} dias</td>
					
					<td>
						<a href="{{ route('cupom.edit', ['id' => $cupom->id]) }} ">
							<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
							
						</a>
					</td>
					<td>
						
						<a href="{{ route('cupom.delete', ['id' => $cupom->id]) }} ">
							<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
						</a>
					</td>
				</tr>
				@endforeach
				@else						
				<tr>
					<td colspan="4" class="text-center">Nenhum Cupom cadastrado</td>
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
		if(option == 'all'){
			for (i = 0; i < tr.length; i++) {
				tr[i].style.display = "";
				
			}
		}
		else{
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
		
	}
</script>
@stop
@stop