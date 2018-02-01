@if (isset($courses))
	@if (count($courses) > 0)
		<ul>
            @foreach($courses as $course)
				<a href="{{ route('course.single', ['id' => $course->id]) }}" class="card">
	                <div class="card-media" style="background-image: url(../images/aulas/{{$course->id}}.jpg);">
	                    <div class="card-overlay"></div>
	                </div>
	                <p><b>{{ $course->name }}</b></p>
	            </a>
	        @endforeach
        </ul>
	@else
		Não existem cursos das opções selecionadas.
	@endif
@else
	Selecione um macrotema para pesquisar ou escreva um nome de curso.
@endif