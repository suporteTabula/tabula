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
        @if($course->video != "" || $course->video != null)
        <video controls width="500px">
          <source src="../images/aulas/{{$course->video}}"> 
          </video>
          @endif
          @auth
          <span class="courseDados" data-id="{{$course->id}}"></span>
          <div class="rating-stars">
            <span class="bg"></span>
            <div class="estrelas">
              <?php for($i = 1; $i<=5; $i++): ?>
                <span class="star" id="{{$i}}" data-url="{{url('course/ratingstar')}}">
                  <span class="starAbsolute"></span>
                </span>
              <?php endfor ?>
              <span class="ratingAverage">{{$rating['star']}}</span>
            </div> 
          </div>
          @else
          <span class="courseDados" data-id="0"></span>
          <div class="rating-stars">
            <span class="bg"></span>
            <div class="estrelas">
              <?php for($i = 1; $i<=5; $i++): ?>
                <span class="star" id="{{$i}}" data-url="{{url('course/ratingstar')}}">
                  <span class="starAbsolute"></span>
                </span>
              <?php endfor ?>
              <span class="ratingAverage">{{$rating['star']}}</span>
            </div> 
          </div>
          @endauth
          <div class="start-course">
            @auth
            @if($auth->id == $author->id)
            <ul>
              <a class="custom-tabula-button" href="{{ route('course.edit.teacher', ['id' => $course->id]) }}">Editar</a>
            </ul>
            <ul>
              <a class="custom-tabula-button" href="{{ route('cart.insert', ['id' => $course->id]) }}">Excluir</a>
            </ul>
            @elseif($hasCourse)
            @if ($progress > 0)
            <ul>
              <a class="custom-button button-tabula" href="{{ route('course.start', ['id' => $course->id]) }}">Continuar Curso</a>
            </ul>
            @else

            <ul>
              <a class="custom-button button-tabula" href="{{ route('course.start', ['id' => $course->id]) }}">Iniciar Curso</a>
            </ul>
            @endif                                
            @else
            <ul><a class="custom-tabula-button" href="{{ route('cart.insert', ['id' => $course->id]) }}">Comprar</a></ul>

            <ul> <a class="custom-tabula-button" href="{{ route('cart.insert', ['id' => $course->id]) }}">Adicionar ao carrinho</a></ul>
            @endif
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
           <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo:&nbsp; {{$chapter->name}}</summary>
           @foreach ($chapter->course_items as $item)
           @if (is_null($item->course_items_parent))
           @if($hasCourse)
           <div id="accbody" class="accordion-body"> <a id="accbody-content" @auth href="{{ route('course.start', ['id' => $course->id]) }}" @endauth>{{$item->name}}</a></div>
           @else
           @if($freeClass->id == $item->id)
           <div id="accbody" class="accordion-body"> <a id="accbody-content" @auth href="{{ route('course.start', ['id' => $item->id]) }}" @else href="#" data-id="{{$freeClass->course_item_types_id}}" @if($freeClass->course_item_types_id == 3) data-type="{{$freeClass->desc}}"  @else data-type="{{url($freeClass->path)}}" @endif @endauth>{{$item->name}}</a></div>
           <div  class="dialog"></div>
           @else
           <div id="accbody" class="accordion-body"> <p id="accbody-content">{{$item->name}}</p></div>
           @endif
           @endif
           @endif
           @endforeach
         </details>
         @endforeach                                       
       </div>
       <div class="column col-5 col-xs-12 col-sm-12">
        <h4>Requisitos</h4>
        @if($course->requirements == null || $course->requirements == "")
        <p>Não existem requisitos para este curso</p>
        @else
        <p>{{$course->requirements}}</p>
        @endif
      </div>
    </div>
  </div>

</section>
@endsection