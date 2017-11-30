@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Todos Macrotemas</p>
			
			<a href="{{ route('categories') }}">
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
			</a>

						
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Nome Macrotema</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead>
				<tbody>
					@if ($categories->count() > 0)
						@foreach ($categories as $category)
							<tr>
								<td style="vertical-align: middle !important;">{{ $category->desc }}</td>
								<td><img style=" width:35px; " src="{{asset('images\edit.svg')}}"></td>
								<td>
									<a href="{{ route('categories', ['id' => $category->id]) }} ">
										<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
									</a>									
								</td>
							</tr>
						@endforeach
					@else						
					<tr>
							<td colspan="4" class="text-center">Sem Macrotemas</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
	
@stop