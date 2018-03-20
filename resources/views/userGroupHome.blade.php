@extends('layouts.userGroup')
@section('content')
    <section class="hero-wrapper">
        <div class="hero-text">
            <h1>{{ $company->desc }}</h1>
            <button class="tabula-button-inverted">Descubra</button>
        </div>
        <div class="presentation-video"></div>
    </section>
    {{-- <h1 style="color: #404040; margin-top: 120px; text-align: center;">MACROTEMAS</h1>
    <section class="macrotemas-mobile">
        @for($i = 0; $i<3; $i++)
            <div class="hex-col-{{ $i+1 }}">
                @for($j = 0; $j < $mobile_col_limit; $j++)
                    <div class="hexagon">
                        <a href="{{ route('search.single', ['id' => $mobile_categories[$mobile_category_count]->id]) }}" class="hex-inner"> <img src="{{ asset('images/hex/mobile/'.$mobile_categories[$mobile_category_count]->mobile_hex_bg) }}">
                            <p>{{ $mobile_categories[$mobile_category_count]->desc }}</p> 
                            <img class="macro-icon" src="{{ asset('images/hex/icon/'.$mobile_categories[$mobile_category_count]->hex_icon) }}" style="display: none;"> 
                        </a>
                        @php($mobile_category_count++)
                    </div>
                @endfor
                @if($mobile_col_limit == 5)
                    @php($mobile_col_limit = 6)
                @else
                    @php($mobile_col_limit = 5)
                @endif
            </div>
        @endfor
    </section>
    <section class="macrotemas-desktop">
        @for($i = 0; $i<3; $i++)
            <div class="hex-row-{{ $i+1 }}">
                @for($j = 0; $j < $row_limit; $j++)
                    <div class="hexagon">
                        <a href="{{ route('search.single', ['id' => $categories[$category_count]->id]) }}" class="hex-inner"> <img src="{{ asset('images/hex/desktop/'.$categories[$category_count]->desktop_hex_bg) }}">
                            <p>{{ $categories[$category_count]->desc }}</p> 
                            <img class="macro-icon" src="{{ asset('images/hex/icon/'.$categories[$category_count]->hex_icon) }}" style="display: none;"> 
                        </a>
                        @php($category_count++)
                    </div>
                @endfor
                @if($row_limit == 5)
                    @php($row_limit = 6)
                @else
                    @php($row_limit = 5)
                @endif
            </div>
        @endfor
    </section> --}}
    <section class="most-viewed-wrapper">
        <h1 style="color: #404040; margin-top: 120px; text-align: center;">CURSOS</h1>
        {{-- <p style="color: #808080; padding-left: 35px;">Cursos populares em {{ $featured_category1 }}</p> --}}
        <div class="carousel1">
            @foreach($courses as $course)
                <a href="{{ route('course.single', ['id' => $course->id]) }}" class="card">
                    <div class="card-media" style="background-image: url(../images/aulas/{{$course->thumb_img}});">
                        <div class="card-overlay"></div>
                    </div>
                    <p><b>{{ $course->name }}</b></p>
                    <p>{{ $course->desc }}</p>
                </a>
            @endforeach
        </div>
        {{-- <p style="color: #808080; padding-left: 35px;">Cursos populares em {{ $featured_category2 }}</p>
        <div class="carousel2">
            @foreach($featured_courses2 as $course)
                <a href="{{ route('course.single', ['id' => $course->id]) }}" class="card">
                    <div class="card-media" style="background-image: url(../images/aulas/{{$course->thumb_img}});">
                        <div class="card-overlay"></div>
                    </div>
                    <p><b>{{ $course->name }}</b></p>
                    <p>{{ $course->desc }}</p>
                </a>
            @endforeach
        </div> --}}
    </section>
    {{-- <h1 style="color: #404040; margin-top: 120px; text-align: center;">BLOG</h1>
    <section class="blog-wrapper">
        <div class="carousel3">
            @foreach($featured_posts as $post)
                <a href="{{ route('course.single', ['id' => $post->id]) }}" class="card">
                    <div class="card-media" style="background-image: url(../images/aulas/{{$post->thumb_img}});">
                        <div class="card-overlay"></div>
                    </div>
                    <p><b>{{ $post->name }}</b></p>
                    <p>{{ $post->desc }}</p>
                </a>
            @endforeach
        </div>
    </section> --}}
@endsection