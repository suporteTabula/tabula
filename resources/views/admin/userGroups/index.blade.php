@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos os Grupos</p>
			
			<a href="{{ route('userGroups.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Empresa</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($userGroups->count() > 0)
						@foreach ($userGroups as $userGroup)
							<tr>
								<td style="vertical-align: middle !important;">
									{{ $userGroup->desc }}
								</td>							
								<td style="vertical-align: middle !important;">
									{{ $userGroup->company->name }}
								</td>
								<td>
									<a href="{{ route('userGroups.edit', ['id' => $userGroup->id]) }} ">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>									
									<a href="{{ route('userGroups.destroy', ['id' => $userGroup->id]) }} ">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>
								</td>
							</tr>
						@endforeach
					@else						
					<tr>
							<td colspan="3" class="text-center">Não existem grupos</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	
@stop