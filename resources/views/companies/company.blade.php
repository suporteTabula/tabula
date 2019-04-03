 @extends('layouts.user')



 @section('content')

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
 <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
 <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
 <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
 <link rel="stylesheet" href="{{asset('css/style.css')}}">

 <title>Tabula - Ensino a distância - Cursos EAD</title>

 <section class="teachers">
    <div class="container grid-md">
        <div class="columns">
            <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="teachers-wrapper" style="margin-top: 50px;">
                    <div class="columns">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 box-empresa">
                            <div class="painel-empresa">
                                <span><img src="{{asset('/images/Profilepic')}}/{{ $auth->avatar}}"></span>
                                <ul>
                                    <li><a href="#missionCompany" id="scroll">Sobre</a></li>
                                    <li><a href="#teacherCompany" id="scroll">Professores</a></li>
                                    <li><a href="#courseCompany" id="scroll"> Cursos no tabula</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div id="content"></div>-->
                   

                    <div class="columns mission-company" id="missionCompany">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="missao-conhecimento missao">
                                <h5>Sobre</h5>
                                <p>{{$auth->company->mission}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="columns teacher-company" id="teacherCompany">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div id="painel-2">
                                <div class="teachers-wrapper teachers-align">
                                    <h4>Professores</h4>
                                    @if(isset($courses))
                                        @foreach($teachers as $teacher)
                                        @if($teacher->courses->count() > 0)
                                        <ul>                                        
                                            <li>
                                                @if ($teacher->empresa_id == $auth->id)<br>              
                                                    <div class="teacher-photo-wrapper"> 
                                                        <a href="{{ route('course.prof', ['id' => $teacher->id]) }}"> 
                                                            <img src="{{asset('/images/Profilepic')}}/{{ $teacher->avatar}}">
                                                            <div class="teacher-description">
                                                                <p>{{$teacher->name}} </p>
                                                            </div>
                                                        </a>
                                                    </div>                                                
                                                @endif
                                             </li>
                                        </ul>
                                        @endif
                                        @endforeach
                                    @else
                                    <div>
                                        <h4>Não possuimos nenhum professor vinculado no momento</h4>
                                    </div>   
                                    @endif                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="columns course-company" id="courseCompany">
                        <h5>Missão</h5>
                    @if(isset($courses))                                    
                        @foreach($courses as $course)
                        <div class="column col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="course-card-search" id="course-card">                    
                                <a href="{{ route('course.single', ['urn' => $course->urn]) }}">
                                    <section class="left">                                  
                                        <div class="course-card__image"><img src="../images/aulas/{{$course->thumb_img}}" class="thumb" /></div>
                                    </section>
                                    <section class="right">
                                        <div class="course-card__description" id="course-card-desc">
                                            <p class="lineclamp-title"><strong>{{ $course->name }}</strong></p>
                                            <p class="lineclamp-desc">{{ $course->desc }}</p>
                                        </div>                          
                                        <div class="course-card__price" id="course-card-price">R$ {{ number_format($course->price, 2, ',', '.') }}</div>
                                    </section>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div>
                            <h4>Não possuimos nenhum curso no momento</h4>
                        </div>
                    @endif
                    </div>              
                </div>
            </div>
        </div>
    </div>
</section>
@section('scripts')

<script type="text/javascript">
    $(document).on('click', '#scroll', function(event){
        var tela = $(window).width();
        if(tela < 768){
            event.preventDefault(); 
            $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top -90
            }, 800);
        } else {
            event.preventDefault(); 
            $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top -50
            }, 800);
        }
    });
</script>
@stop
@stop
