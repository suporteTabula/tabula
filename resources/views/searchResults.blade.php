@if (isset($courses))
	@if (count($courses) > 0)
        @foreach($courses as $course)
            <a href="{{ route('course.single', ['id' => $course->id]) }}" class="column col-3 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 course-item">
                <div class="columns">
                    <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image" style="background-image: url(../images/aulas/{{$course->thumb_img}});"></div>
                    <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-gray text-white">
                        <p class="lineclamp-title"><strong>{{ $course->name }}</strong></p>
                        <p class="lineclamp-desc">{{ $course->desc }}</p>
                        <div class="course-price">
                            <p>{{ $course->price }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach                
    @else
        Não existem cursos das opções selecionadas.
    @endif       
@else
	Selecione um macrotema para pesquisar ou escreva um nome de curso.
@endif