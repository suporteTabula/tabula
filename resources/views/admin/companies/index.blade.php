@extends('layouts.admin')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Empresas cadastradas</p>
			
			<a href="{{ route('company.create') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($company->count() > 0)
						@foreach ($company as $companies)
							<tr>
								<td style="vertical-align: middle !important;">
									{{ $company->name }}
								</td>							
								<td style="vertical-align: middle !important;">
									{{ $company->desc }}
								</td>
								<td>
									<a href="{{ route('company.edit', ['id' => $company->id]) }}">
										<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
									</a>
								</td>
								<td>									
									<a href="{{ route('company.destroy', ['id' => $company->id]) }}">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>
								</td>
							</tr>
						@endforeach
					@else						
						<tr>
							<td colspan="3" class="text-center">Não existem empresas cadastradas</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@stop