@if (isset($courses))
	@if (count($courses) > 0)
        @foreach($courses as $course)
        @if($course->avaliable == 1)
            <ul class="clearfix grid" id="courses">
                <li class="clearfix">
                    <div class="course-card" id="course-card">                          
                        <a href="{{ route('course.single', ['id' => $course->id]) }}">
                            <section class="left">                                  
                                <div class="course-card__image"><img src="../images/aulas/{{$course->thumb_img}}" class="thumb" /></div>
                            </section>
                            <section class="right">
                                <div class="course-card__description" id="course-card-desc">
                                    <p class="lineclamp-title"><strong>{{ $course->name }}</strong></p>
                                    <p class="lineclamp-desc">{{ $course->desc }}</p>
                                 </div>                          
                                <div class="course-card__price" id="course-card-price">R${{number_format($course->price, 2,',', '.')}}</div>
                            </section>
                        </a>
                    </div>
                </li>
            </ul>
            @endif
        @endforeach                
    @else
        Não existem cursos das opções selecionadas.
    @endif       
@else
	Selecione um macrotema para pesquisar ou escreva um nome de curso.
@endif