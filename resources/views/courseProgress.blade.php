@extends('layouts.user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/course-inside.css') }}">
@endsection
@section('content')
    <section class="course-inner-content">
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-12 course-controls">
                    <button class="button-tabula">Finalizar Aula</button>
                    <button id="open-class" class="button-tabula">Menu de Aulas</button>
                    <button id="close-class" class="button-tabula">Fechar Menu de Aulas</button>
                </div>
                <div class="column col-12 course-video-wrapper">
                    <video controls poster="{{ asset('images/layout/home/poster-video.PNG') }}" width="500px">
                        <source src="{{ asset('images/layout/home/presentation-tabula.mp4') }}">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="offscreen-course-content">
         @foreach ($chapters as $chapter)
            <details class="accordion">
                <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo: {{ $chapter->name }}</summary>
                @foreach ($chapter->course_items as $item)
                    @if(is_null($item->course_items_parent))
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" class="teste" value="{{ $item->id }}">{{ $item->name }}</a>
                        <input type="checkbox" name="progress" 
                            @foreach ($users->items as $i)
                                @if ($i->pivot->course_item_status_id == 1 && $item->id == $i->pivot->course_item_id)
                                    checked
                                @endif 
                            @endforeach >  
                            </div>                
                        <br>
                    @endif
                @endforeach
            </details>
        @endforeach
        
    </section>
   <section class="search-wrapper">
        <div class="search-container">
            @foreach ($chapters as $chapter)
                {{ $chapter->name }}<br>
                @foreach ($chapter->course_items as $item)
                    @if(is_null($item->course_items_parent))
                        <a class="teste" value="{{ $item->id }}"> {{ $item->name }} </a>
                        <input type="checkbox" name="progress" 
                        @foreach ($users->items as $i)
                            @if ($i->pivot->course_item_status_id == 1 && $item->id == $i->pivot->course_item_id)
                                checked
                            @endif 
                        @endforeach >                  
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="search-results">
        </div>
    </section>

    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.teste').click(function(){

                    var id = $(this).attr('value');  
                    //console.log(id);

                    req = {item_id:id};
                    $.ajax({
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '{{ route('course.lesson') }}',
                        data: req,
                        error: function(e){
                            console.log(e);
                        },
                        success: function(response){
                            $('.search-results').html(response);
                        }
                    });                    
                });
            });
        </script>        
    @stop
@endsection