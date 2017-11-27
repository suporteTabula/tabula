@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Tipos de Usuários</p>
			
			<a href="{{ route('userType.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>

						
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($usersType->count() > 0)
						@foreach ($usersType as $userType)
							<tr>
								<td style="vertical-align: middle !important;">{{ $userType->type_name }}</td>
								<td><img style=" width:35px; " src="{{asset('images\edit.svg')}}"></td>
								<td>									
									<a href="{{ route('userType.delete', ['id' => $userType->id]) }} ">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>
								</td>
							</tr>
						@endforeach
					@else						
					<tr>
							<td colspan="3" class="text-center">Sem tipos de usuário</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	
@stop