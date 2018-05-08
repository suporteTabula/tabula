@extends('layouts.user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/course-overview.css') }}">
@endsection
@section('content')

    <div class="macroicon-wrapper"> <img id="macroicon" src="{{ asset('images/layout/course/'.$course->category->hex_course_icon) }}" width="80px;"></div>

    <section class="course-overview">
        <div class="container grid-lg">
            <div class="columns" style="border-top: 2px solid {{$course->category->course_color}} ">
                <div class="column col-7 col-xs-12 col-sm-12 col-md-6 course-desc">
                    <p id="macrotext"><strong>{{ $course->category->desc }}</strong></p>
                    <h3>{{ $course->name }}</h3><p>{{ $course->desc }}</p>
                    <div class="teacher-wrapper">
                        <div class="teacher-wrapper-left"> <img src="{{ asset('images/layout/course/avatar.svg') }}" width="25px;">
                            <p>{{ $author->first_name }} {{$author->last_name}}</p>
                        </div>
                    </div>
                </div>
                <div class="column col-5 col-xs-12 col-sm-12 col-md-6 video-preview">
                    <video controls poster="../images/layout/home/poster-video.PNG" width="500px">
                        <source src="../images/layout/home/presentation-tabula.mp4"> </video>
                    <div class="rating-stars"> <img src="{{ asset('images/layout/course/rating-stars.svg') }}" width="120px;">
                        <p><strong>5/5</strong></p>
                    </div>
                    <div class="start-course">
                        @auth
                            @if($hasCourse)
                                <a class="custom-button button-tabula" href="{{ route('course.start', ['id' => $course->id]) }}">Iniciar Curso</a>
                            @else
                                <a class="custom-button button-tabula" href="{{ route('cart.insert', ['id' => $course->id]) }}">Comprar</a>
                                <a class="custom-button button-tabula" href="{{ route('cart.insert', ['id' => $course->id]) }}">Adicionar ao carrinho</a>
                            @endif
                        @else 
                            <a class="custom-button button-tabula" href="{{ route('cart.insert', ['id' => $course->id]) }}">Comprar</a>
                            <a class="custom-button button-tabula" href="{{ route('cart.insert', ['id' => $course->id]) }}">Adicionar ao carrinho</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="will-learn">
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-7 col-xs-12 col-sm-12">
                    <h4>Conteúdo</h4>
                        @foreach ($chapters as $chapter)
                            <details class="accordion">
                                 <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo: {{$chapter->name}}</summary>
                                 @foreach ($chapter->course_items as $item)
                                     @if (is_null($item->course_items_parent))
                                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">{{$item->name}}</a> </div>
                                     @endif
                                 @endforeach
                            </details>
                        @endforeach
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo</summary>
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" href="#">Aula</a> </div>
                    </details>
                </div>
                <div class="column col-5 col-xs-12 col-sm-12">
                    <h4>Requisitos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, odio?</p>
                    <ul>
                        <li>Requisito</li>
                        <li>Requisito</li>
                        <li>Requisito</li>
                        <li>Requisito</li>
                        <li>Requisito</li>
                        <li>Requisito</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection