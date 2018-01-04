@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar capítulo
		</div>
		<div class="panel-body">
			<form action="{{ route('course.chapter.update', ['id' => $chapter->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Nome</label>
					<input class="form-control" type="text" value="{{ $chapter->name }}" placeholder="Nome do capítulo" name="name">
				</div>
				<div class="form-group">
					<label for="desc">Descrição</label>
					<input class="form-control" type="text" value="{{ $chapter->desc }}" placeholder="Descrição do capítulo" name="desc">
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Salvar</button>
						<a class="btn btn-success" href="{{ route('course.edit', ['id' => $chapter->course_id]) }}">Voltar</a>
					</div>
				</div>
			</form>

			<div class="title_chapter">
				<p style="line-height: 40px;">Aulas/Avaliações</p>

				<a class="item_click">
					<img style=" width:30px; float: right; " src="{{asset('images\add.svg')}}">
				</a>
			</div>

			 <div class="items">
				<form action="{{ route('course.item', ['id' => $chapter->id]) }}"method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="name">Nome</label>
						<input class="form-control" type="text" placeholder="Nome da aula" name="name">
					</div>

					<div class="form-group">
						<label for="desc">Descrição</label>
						<input class="form-control" type="text" placeholder="Descrição da aula" name="desc">
					</div>
						
					<div class="form-group">
						<div class="text-center">
							<button class="btn btn-success" type="submit">Salvar</button>
							{{--<a class="btn btn-success" href="{{ route('courses') }}">Voltar</a>--}}
						</div>
					</div>
				</form>
			</div> 		
			
			<table class="table table-hover">
				<thead>
					<th>Aula/Avaliação</th>
					<th>Descrição</th>
					<th>Editar</th>
				</thead>
				<tbody>
					@if ($items->count() > 0)
						@foreach ($items as $item)
							@if($course_item_group->id == $item->course_item_group_id)
								<tr>
									<td style="vertical-align: middle !important;">
										{{ $item->name }}
									</td>							
									<td style="vertical-align: middle !important;">
										{{ $item->desc }}
									</td>
									<td>
										<a href="{{ route('course.item.edit', ['id' => $item->id]) }}">
											<img style=" width:35px; " src="{{asset('images\edit.svg')}}">
										</a>
									</td>									
								</tr>							
							@endif
						@endforeach
					@else						
						<tr>
							<td colspan="3" class="text-center">Não existem aulas/avaliações neste capítulo</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>

	@section('scripts')
		<script>
			$('.items').hide();
			$('.item_click').on('click', function() {
				$('.items').toggle();
			});
		</script>
	@stop
@stop