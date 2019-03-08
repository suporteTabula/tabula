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
 <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/home-empresa.css">



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

                    <div id="painel-1">
                        @foreach($teachers->courses as $course)
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
                                            <div class="course-card__price" id="course-card-price">{{ $course->price }}</div>
                                        </section>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        @endforeach                
                    </div>

                    <div class="columns">
                        <div class="column col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="missao-conhecimento">
                                <h5>Missão</h5>
                                <p>{{$auth->company->mission}}</p>
                            </div>
                        </div>
                        <div class="column col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="missao-conhecimento">
                                <h5>Áreas de Conhecimento</h5>
                                <p>{{$auth->company->knowledge}}</p>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div id="painel-2">
                                <div class="teachers-wrapper">
                                    <h4>Professores</h4>
                                    @foreach($teachers as $teacher)
                                    @if ($teacher->empresa_id == $auth->id)<br>
                                    <div class="teacher-photo-wrapper"> 
                                        <a href="#"> 
                                            <img src="{{asset('/images/Profilepic')}}/{{ $teacher->avatar}}">
                                            <div class="teacher-description">
                                                <p>{{$teacher->name}} </p>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
$(document).ready(function(){

        $('#courseCompany').click(function(){
            $('#painel-2','#painel-3', '#painel-4', ).slideUp(500);
            $('#painel-1').delay(200).slideDown(500);
        });

        $('#teacherCompany').click(function(){
            $('#painel-1','#painel-3', '#painel-4' ).slideUp(500);
            $('#painel-2').delay(200).slideDown(500);
        });

        $('#knowledgeCompany').click(function(){
            $('#painel-1','#painel-2', '#painel-4' ).slideUp(500);
            $('#painel-3').delay(200).slideDown(500);
        });

        $('#missionCompany').click(function(){
            $('#painel-1','#painel-2', '#painel-3').slideUp(500);
            $('#painel-4').delay(200).slideDown(500);
        });


    });
-->




@stop
