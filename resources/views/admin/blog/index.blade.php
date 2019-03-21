@extends('layouts.admin') 
 
@section('content') 
	<div class="panel panel-default"> 
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Posts do blog</p> 
			<a href="{{ route('post.create') }}"> 
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}"> 
			</a> 
		</div> 
		<div class="panel-body"> 
			<table id="categories" class="table table-hover"> 
				<thead> 
					<th>Título</th>
					<th>Categoria</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead> 
				<tbody class="panel-filter">
					
					@forelse ($posts as $post) 
						<tr>
							<td style="vertical-align: middle !important;">{{ $post->title }}</td> 
							<td>
								{{ $post->category->title }}
							</td>
							<td>
								<a href="{{ route('category.edit', ['id' => $post->id]) }} ">
									<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
								</a>
							</td> 
							<td> 
								<a href="{{ route('category.delete', ['id' => $post->id]) }} "> 
									<img style=" width:35px; " src="{{ asset('images\error.svg') }}"> 
								</a>                   
							</td> 
						</tr> 
					@empty
						<tr> 
							<td colspan="4" class="text-center">Sem posts</td> 
						</tr> 
					@endforelse 
				</tbody> 
			</table> 
		</div> 
	</div> 
	@section('scripts')
	
	@stop
@stop