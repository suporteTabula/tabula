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
            <p>{{ $author->name }}</p>
          </div>
        </div>
      </div>
      <div class="column col-5 col-xs-12 col-sm-12 col-md-6 video-preview">
        @if($course->video != "" || $course->video != null)
        <video controls width="500px">
          <source src="../images/aulas/{{$course->video}}"> 
          </video>
          @endif
         
          <div class="start-course">
            @auth
              @if($auth->id == $author->id)
              <ul>
                @if($auth->userTypes->first()->id == 1)
                <a class="custom-tabula-button" href="{{ route('course.edit', ['id' => $course->id]) }}">Editar</a>
                @else
                <a class="custom-tabula-button" href="{{ route('course.edit.teacher', ['id' => $course->id]) }}">Editar</a>
                @endif
              </ul>
              @elseif($hasCourse)
                @if ($progress > 0)
                <ul>
                  <a class="custom-button button-tabula" href="{{ route('course.start', ['urn' => $course->urn]) }}">Continuar Curso</a>
                </ul>
                @else
                <ul>
                  <a class="custom-button button-tabula" href="{{ route('course.start', ['urn' => $course->urn]) }}">Iniciar Curso</a>
                </ul>
                @endif
              <ul>
                <a class="custom-button button-tabula classContent" href="#">Conteúdo</a>
                <a class="custom-button button-tabula question" href="#">Perguntas</a>
              </ul>  
               <ul>
              </ul>                               
              @else
              <ul><a class="custom-tabula-button" href="{{ route('finish.insert', ['id' => $course->id]) }}">Comprar</a></ul>

              <ul> <a class="custom-tabula-button" href="{{ route('cart.insert', ['id' => $course->id]) }}">Adicionar ao carrinho</a></ul>
              @endif
            @else
            <ul><a class="custom-tabula-button" href="{{ route('new.cart', ['id' => $course->id]) }}">Comprar</a></ul>

            <ul> <a class="custom-tabula-button" href="{{ route('new.cart', ['id' => $course->id]) }}">Adicionar ao carrinho</a></ul>  
            @endauth

          </div>
          <div class="start-course">
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
                <span class="urlRating" data-url="{{route('ratingstar')}}"></span>
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
          </div>
        </div>
        <div class="column col-12 col-xs-12 col-sm-12 col-md-12"> 
          <a class="act-rating btn custom-tabula-button float-right" href="#">Avaliar o Curso</a> 
        </div>
      </div>
    </div>
  </section>

  <section class="will-learn">
    <div class="container grid-lg">
      <div class="columns">
        <div class="column col-7 col-xs-12 col-sm-12">
          <h5>Conteúdo</h5>
          @foreach ($chapters as $chapter)
          <details class="accordion">
           <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo:&nbsp; {{$chapter->name}}</summary>
           @foreach ($chapter->course_items as $item)
            @if (is_null($item->course_items_parent))
              @if($hasCourse)
              <div id="accbody" class="accordion-body"> <a id="accbody-content" @auth href="{{ route('course.start', ['urn' => $course->urn]) }}" @endauth>{{$item->name}}</a></div>
              @else
                @if($item->freeItem == 1)
                <div id="accbody" class="accordion-body"> 
                  <a id="accbody-content-free" href="#" data-id="{{$item->course_item_types_id}}" @if($item->course_item_types_id == 3) data-type="{{$item->desc}}"  @else data-type="{{url($item->path)}}" @endif>{{$item->name}}</a>
                </div>
                <div  class="dialog"></div>
                
                @else
                <div id="accbody" class="accordion-body">
                  <p id="accbody-content">{{$item->name}}</p>
                </div>
              @endif
            @endif
           @endif
          @endforeach
         </details>
         @endforeach                                       
       </div>
       <div class="column col-5 col-xs-12 col-sm-12">
        <h5>Requisitos</h5>
        @if($course->requirements == null || $course->requirements == "")
        <p>Não existem requisitos para este curso</p>
        @else
        <p>{{$course->requirements}}</p>
        @endif
      </div>
    </div>
  </div>
</section>
@if(isset($courses))
<section class="will-learn">
    <div class="container grid-lg">
      <div class="columns">
        <div class="column col-12 col-xs-12 col-sm-12">
          <h5>Cursos Relacionados</h5>
          <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
              @foreach($courses as $crs)
              <div class="course-card-search">
                  <a href="{{ route('course.single', ['urn' => $crs->urn]) }}">
                      <div class="course-card__image">
                          <img src="{{asset('')}}/images/aulas/{{$crs->thumb_img}}" class="thumb" />
                      </div>
                      <div class="course-card__description">
                          <p>{{ $crs->name }}</p>
                          <p>{{ $crs->desc }}</p>
                          <div class="course-card__price">R${{number_format($crs->price, 2,',', '.')}}</div>
                      </div>
                  </a>
              </div>
              @endforeach
          </div>
        @endif
        </div>
    </div>
  </div>
</section>
@auth
<section class="comments-teacher">
  <div class="container grid-lg">
    <div class="columns">
      <div class="column col-12 col-xs-12 col-sm-12">
        <form class="form-control" id="comments" method="POST" action="{{route('course.comment')}}">
          {{ csrf_field() }} 
          <input type="hidden" name="idCourse" value="{{$course->id}}">
          <input type="hidden" name="typeComment" value="question">
          <div class="form-group">
            <label class="form-label" for="comments">Faça uma pergunta:</label>
            <textarea style="border-radius: 10px" class="form-input theComment"   name="comments" rows="3" placeholder="Digite a pergunta"></textarea>
          </div>
          <button class="btn btn-lg custom-button button-tabula" style="float: right; margin-top: 5px;">Enviar</button>
        </form>
      </div>
      <div class="column col-12 col-xs-12 col-sm-12" >
        <h3>Perguntas Frequentes!</h3>
        @foreach ($course->comments as $comment)
        @if($comment->type_comment == 'question')
        <div class="columns" style="border:1px solid; border-radius: 2px;">
          <div class="column col-10 col-xs-10 col-sm-10" >
            <h5>{{$comment->user->name}} </h5>
            <hr>
            <h6>{{$comment->comment}}</h6>
          </div>
          <div class="column col-2 col-xs-2 col-sm-2" >
            <button class="btn btn-lg custom-button button-tabula btn1" style="float: right; margin-top: 5px;">v</button>
            <button class="btn btn-lg custom-button button-tabula btn2" style="float: right;">^</button>
            <div class="answer-{{$comment->id}}">
              
            </div>
          </div>
        </div>
        @endif
        @endforeach
          @foreach ($course->comments as $comment)
          @if($comment->type_comment == 'question')
          <div class="answer">
              <div class="column col-12 col-xs-12 col-sm-12" >
              <h5>{{$comment->user->name}} </h5>
              <h6>{{$comment->comment}}</h6>
              <hr>
              </div>
          </div>
          @endif
          @endforeach
      </div>
    </div>
  </div>
</section>
@endauth

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $(".btn2").hide();
    $(".answer").hide();

    $(".btn2").click(function(){
      $(".btn1").show();
      $(".btn2").hide();  
      $(".answer").slideUp();
    });

    $(".btn1").click(function(){
      $(".btn1").hide();
      $(".btn2").show();  
      $(".answer").slideDown();
    });

    $('.comments-teacher').hide();
    $('.classContent').click(function(){
      $('.will-learn').show();
      $('.comments-teacher').hide();
    });
    $('.question').click(function(){
      $('.will-learn').hide();
      $('.comments-teacher').show();
    });

    
  });
</script>
@stop
@endsection