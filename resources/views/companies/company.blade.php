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
                                    <li><a href="#" id="courseCompany"> Cursos no tabula</a></li>
                                    <li><a href="#" id="teacherCompany">Professores</a></li>
                                    <li><a href="#" id="knowledgeCompany">Áreas de Conhecimento</a></li>
                                    <li><a href="#" id="missionCompany">Missão</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div id="content"></div>-->
                   
                        <div class="columns course-company">
                        @if(isset($courses))                                    
                            @foreach($courses as $course)
                                <div class="column col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
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
                   
                    

                    <div class="columns mission-company">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="missao-conhecimento missao">
                                <h5>Missão</h5>
                                <p>{{$auth->company->mission}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="columns knowledge-company">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="missao-conhecimento">
                                <h5>Áreas de Conhecimento</h5>
                                <p>{{$auth->company->knowledge}}</p>
                            </div>
                        </div>
                    </div>


                    <div class="columns teacher-company">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div id="painel-2">
                                <div class="teachers-wrapper teachers-align">
                                    <h4>Professores</h4>
                                    @if(isset($courses))
                                        @foreach($teachers as $teacher)
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
                </div>
            </div>
        </div>
    </div>
</section>


@stop
