@extends('layouts.user')

@section('content')
<div class="container grid-lg content-padding">

    <div class="columns">
        <h1>{{$category_desc}}</h1>
    </div>
    <div class="columns" id="search-results">
        @if (count($courses) > 0)
            @foreach($courses as $course)
                <ul class="clearfix grid" id="courses">
                    <li class="clearfix">
                        <div class="course-card-search" id="course-card">                          
                            <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                <section class="left">                                  
                                    <div class="course-card__image"><img src="{{asset('/images/aulas')}}/{{$course->thumb_img}}" class="thumb" /></div>
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
            @endforeach                
        @else
            Não existem cursos nesta categoria.
        @endif                         
    </div>
</div>
@endsection