@if (isset($courses))
	@if (count($courses) > 0)
		@foreach ($courses as $course)
			<a href=" {{ route('course.single', ['id' => $course->id]) }}">
				<div style="height:100%;width:100%"> {{ $course->name }}</div>
			</a>
		@endforeach
	@else
		Não existem cursos das opções selecionadas.
	@endif
@else
	Selecione um macrotema para pesquisar ou escreva um nome de curso.
@endif