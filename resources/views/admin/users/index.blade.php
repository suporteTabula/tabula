@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Usuários</p>
			<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">

						
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Tipo de Usário</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($users->count() > 0)
						@foreach ($users as $user)
							<tr>
								<td style="vertical-align: middle !important;">{{ $user->name }}</td>
								<td>Tipo Usuário</td>
								<td><img style=" width:35px; " src="{{asset('images\edit.svg')}}"></td>
								<td><img style=" width:35px; " src="{{ asset('images\error.svg') }}"></td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3" class="text-center">No users</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	
@stop