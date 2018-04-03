@extends('layouts.userGroup')
@section('content')
    <section class="hero-wrapper">
        <div class="hero-text">
            <h1>{{ $company->desc }}</h1>
            <button class="tabula-button-inverted">Descubra</button>
        </div>
        <div class="presentation-video"></div>
    </section>
    <section class="most-viewed-wrapper">
        <h1 style="color: #404040; margin-top: 120px; text-align: center;">CURSOS</h1>
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
    </section>
@endsection