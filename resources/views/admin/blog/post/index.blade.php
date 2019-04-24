@extends('layouts.admin') 
 
@section('content') 
	<div class="panel panel-default"> 
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Posts do blog</p> 
			<a href="{{ route('blog.post.create') }}"> 
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}"> 
			</a> 
		</div> 
		<div class="panel-body"> 
			<table id="categories" class="table table-hover"> 
				<thead> 
					<th>Título</th>
					<th>Nome</th>
					<th>Categoria</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead> 
				<tbody class="panel-filter">
					
					@forelse ($postBlog as $post) 
						<tr>
							<td style="vertical-align: middle !important;">{{ $post->meta_title }}</td> 
							<td>{{ $post->name }}</td>
							<td>{{ $post->category->name }}</td>
							<td>
								<a href="{{ route('blog.post.edit', ['id' => $post->id]) }} ">
									<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
								</a>
							</td> 
							<td> 
								<a href="{{ route('blog.post.delete', ['id' => $post->id]) }} "> 
									<img style=" width:35px; " src="{{ asset('images\error.svg') }}"> 
								</a>                   
							</td> 
						</tr> 
					@empty
						<tr> 
							<td colspan="4" class="text-center">Sem Categorias Cadastradas</td> 
						</tr> 
					@endforelse 
				</tbody> 
			</table> 
		</div> 
	</div> 
	@section('scripts')
	
	@stop
@stop