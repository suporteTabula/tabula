@if (isset($courses))
	@if (count($courses) > 0)
		<ul>
            @foreach($courses as $course)
                <a href=" {{ route('course.single', ['id' => $course->id]) }}">
                    <li>{{ $course->name }}</li>
                </a>
            @endforeach
        </ul>
	@else
		Não existem cursos das opções selecionadas.
	@endif
@else
	Selecione um macrotema para pesquisar ou escreva um nome de curso.
@endif