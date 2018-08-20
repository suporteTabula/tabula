@extends('layouts.user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/course-inside.css') }}">
@endsection
@section('content')
    <section class="course-inner-content">
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-12 course-controls">                    
                    <button id="open-class" class="button-tabula">Menu de Aulas</button>
                    <button id="close-class" class="button-tabula">Fechar Menu de Aulas</button>
                </div>
                <div class="column col-12 course-video-wrapper" id="aulas">
                    @if (isset($items))
                        <ul>
                            @foreach ($items as $item)
                                @if ($item->course_item_types_id >= 5)
                                    
                                    <form action="{{ route('course.answer', ['id' => $item->id]) }} " method="post" enctype="multipart/form-data"> <!--FORM PASSANDO ID DO ITEM PRA SALVAR EM ORDEM AS ALTERNATIVAS-->
                                        {{ csrf_field() }}
                                        
                                        @foreach ($item->item_child as $child)
                                            @if ($child->course_item_types_id == 6 || $child->course_item_types_id == 9)
                                                <label>{{ $child->desc }}</label><br>  
                                                @foreach ($child->course_item_options as $options)
                                                    @if ($child->course_item_types_id == 6)
                                                        <input type="hidden" name="multiple_{{$options->course_item->id}}[]" value="0">
                                                        <input type="checkbox" name="multiple_{{$options->course_item->id}}[]" value="{{$options->id}}"> {{ $options->desc }}<br>
                                                    @elseif ($child->course_item_types_id == 9)
                                                        <input type="hidden" name="alternativa_{{$options->course_item->id}}[]" value="0">
                                                        <input type="radio" name="alternativa_{{$options->course_item->id}}[]" value="{{$options->id}}"> {{ $options->desc}}<br>
                                                    @endif   
                                                @endforeach
                                            @else
                                                <label>{{ $child->desc }}</label><br> 
                                                @if ($child->course_item_types_id == 5)
                                                    <input type="text" name="dissertativa_{{$child->id}}"><br> 
                                                @else
                                                    <input type="hidden" name="trueFalse_{{$child->id}}" value="">
                                                    <input type="radio" name="trueFalse_{{$child->id}}" value="1">Verdadeira
                                                    <input type="radio" name="trueFalse_{{$child->id}}" value="0">Falsa<br>
                                                 @endif
                                            @endif
                                        @endforeach
                                        <input type="submit" name="next" id="next" value="Enviar avaliação">
                                    </form>
                                @else
                                    {{ $item->desc }}
                                    @if (!is_null($item->path))
                                        <img src="{{ asset($item->path) }}">
                                    @endif
                                    @foreach ($item->item_child as $child)
                                        {{ $child->id }}
                                    @endforeach

                                    
                                    <form action="{{ route('course.start', ['id' => $item->course_item_group->course_id]) }}" method="get" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <input type="hidden" id="item_id" name="item_id" value="{{$item->id}}">
                                        <input type="submit" class="button-tabula" name="next" value="Finalizar aula">
                                    </form>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="offscreen-course-content">
         @foreach ($chapters as $chapter)
            <details class="accordion">
                <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo:{{ $chapter->name }}</summary>
                @foreach ($chapter->course_items as $item)
                    @if(is_null($item->course_items_parent))
                        <div id="accbody" class="accordion-body "> <a id="accbody-content" class="aula" value="{{ $item->id }}">{{ $item->name }}</a>
                        <input id="custom-checkbox" type="checkbox" name="progress" 
                            @foreach ($users->items as $i)
                                @if ($i->pivot->course_item_status_id == 1 && $item->id == $i->pivot->course_item_id)
                                    checked
                                @endif 
                            @endforeach >  
                            </div>                
                        
                    @endif
                @endforeach
            </details>
        @endforeach
        
    </section>
   
   

    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.aula').click(function(){

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
                            $('#aulas').html(response);
                        }
                    });                    
                });
            });
        </script>        
    @stop
@endsection