@extends('layouts.admin')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading" style="position: relative; height:80x; ">
		<p style="line-height: 40px;">Todos os SEO's Registrados</p>
		
		<a href="{{ route('seo.create') }}">
			<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}">
		</a>


	</div>
	<div class="panel-body">
		<table class="table table-hover" id="userTable">
			<thead>
				<th>Tipo de SEO</th>
				<th>Descrição</th>
				<th>Página</th>
				<th>Editar</th>
				<th>Deletar</th>
			</thead>
			<tbody>
				@if ($seos->count() > 0)
				@foreach ($seos as $seo)
				<tr>
					<td style="vertical-align: middle !important;">{{ $seo->meta_type}}</td>
					<td style="vertical-align: middle !important;">{{ $seo->meta_description}}</td>
					@if($seo->page_type == 'category')
					<td style="vertical-align: middle !important;">{{ $seo->pages->desc}}</td>
					@elseif($seo->page_type == 'course')
					<td style="vertical-align: middle !important;">{{ $seo->pages->name}}</td>
					@else
					<td style="vertical-align: middle !important;">Home</td>
					@endif
					<td>
						<a href="{{ route('seo.edit', ['id' => $seo->id]) }} ">
							<img style=" width:35px; " src="{{asset('images\edit.svg')}}">		
						</a>
					</td>
					<td>
						<a href="{{ route('seo.delete', ['id' => $seo->id]) }} ">
							<img style=" width:35px; " src="{{ asset('images\error.svg') }}">
						</a>
					</td>
				</tr>
				@endforeach
				@else						
				<tr>
					<td colspan="4" class="text-center">Nenhum SEO cadastrado</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@stop