@extends('layouts.admin') 
 
@section('content') 
	<div class="panel panel-default"> 
		<div class="panel-heading" style="position: relative; height:80x; ">
			<p style="line-height: 40px;">Categorias do blog</p> 
			<a href="{{ route('blog.create') }}"> 
				<img style=" width:35px; position: absolute; right:15px; top: 12px;" src="{{asset('images\add.svg')}}"> 
			</a> 
		</div> 
		<div class="panel-body"> 
			<table id="categories" class="table table-hover"> 
				<thead> 
					<th>Título</th>
					<th>Categoria</th>
					<th>Descrição</th>
					<th>Editar</th>
					<th>Deletar</th>
				</thead> 
				<tbody class="panel-filter">
					
					@forelse ($categBlog as $categ) 
						<tr>
							<td style="vertical-align: middle !important;">{{ $categ->meta_title }}</td> 
							<td>{{ $categ->name }}</td>
							<td>{{ $categ->meta_description }}</td>
							<td>
								<a href="{{ route('blog.edit', ['id' => $categ->id]) }} ">
									<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
								</a>
							</td> 
							<td> 
								<a href="{{ route('blog.delete', ['id' => $categ->id]) }} "> 
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