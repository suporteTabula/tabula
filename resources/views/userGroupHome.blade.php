@extends('layouts.userGroup')
@section('content')

    <section class="hero-landing">
        <div class="container grid-md">
            <div class="columns bg-primary-white">
                <div class="column col-6 col-xs-12 col-sm-12 hero-text">
                    <h2 class="text-{{$company->theme_color}}">A plataforma de ensino a <u>distância</u> mais <u>inovadora</u> e <u>prática</u> onde qualquer pessoa pode <u>aprender</u> ou <u>ensinar</u>.</h2>
                    <button id="explore" class="button-tabula-{{$company->theme_color}}">EXPLORE</button>
                </div>
                <div class="column col-6 hide-sm hero-mock"></div>
            </div>
        </div>
    </section>
    
    <section class="course-gallery">
        <div class="container grid-md">
            <div class="columns">
                @foreach($courses as $course)
                    <a href="{{ route('course.single', ['id' => $course->id]) }}" class="column  col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                        <div class="columns">
                            <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image" style="background-image: url(../images/aulas/{{$course->thumb_img}})"></div>
                            <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-{{$company->theme_color}}">
                                <p><strong>{{$course->name}}</strong></p>
                                <p>{{$course->desc}}</p>
                                <div class="course-price">
                                    <p>{{$course->price}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <a class="column  col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-{{$company->theme_color}}">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-{{$company->theme_color}}">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-{{$company->theme_color}}">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-{{$company->theme_color}}">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <section class="about">
        <div class="container grid-md">
            <div class="columns spacer-2 bg-primary-white">
                <div class="column col-8 col-xs-12 col-sm-12 col-md-12 video-wrapper">
                    <video controls poster="../images/layout/home/poster-video.PNG" width="500px">
                        <source src="../images/layout/home/presentation-tabula.mp4">
                    </video>
                </div>
                <div class="about-text column col-4 col-xs-12 col-sm-12 col-md-12">
                    <p class="text-{{$company->theme_color}}">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti corporis, sed aperiam! Eum quae assumenda, optio suscipit fugiat facilis minima eos doloremque nostrum, modi quis est repudiandae eveniet tempora sapiente nihil. Quo enim animi accusantium, id sint doloribus obcaecati nulla beatae rerum vero dolore culpa unde delectus at. Voluptate, ex.</p>
                </div>
            </div>
        </div>
    </section>

@endsection