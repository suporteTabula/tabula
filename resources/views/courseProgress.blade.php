@extends('layouts.user')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/course-inside.css') }}">
@endsection
@section('content')
<section class="course-inner-content">
    <div class="container">
        <div class="columns col-oneline">
            <div class="column col-4" id="nav">
                <section class="offscreen-course-content">        
                    @foreach ($chapters as $chapter)         
                    <details class="accordion">
                        <summary class="accordion-header"> <i class="icon icon-arrow-right mr-1"></i> Capitulo: {{ $chapter->name }}
                            <p style="position: relative; float: right;">
                                <span id="chap-{{$chapter->id}}" >{{$chapter->progressDo}}</span>
                                <span>/{{count($chapter->course_items)}}</span>
                            </p>
                        </summary>
                        @foreach ($chapter->course_items as $item)
                        @if(is_null($item->course_items_parent))
                        <div id="accbody" class="accordion-body"> <a id="accbody-content" class="aula" value="{{ $item->id }}">{{ $item->name }}</a>
                            <span class="round">
                                <input type="checkbox" class="input-progress-label" name="progress" id="{{ $item->id }}" 
                                @foreach ($auth->items as $i)
                                @if ($i->pivot->course_item_status_id == 1 && $item->id == $i->pivot->course_item_id)
                                checked
                                @endif 
                                @endforeach >  
                                <label class="progress-label" for="{{ $item->id }}"></label>
                            </span>
                        </div>                                                                
                        @endif                  
                        @endforeach
                    </details>
                    @endforeach
                </section>
            </div>

            <div class="column course-video-wrapper" id="aulas">

            </div>
            <div class="column col-2 course-controls">   
                <button id="next" class="button-tabula">Próxima Aula</button>                 
                <button id="open-class" class="button-tabula">Menu de Aulas</button>
                <button id="close-class" class="button-tabula">Fechar Menu de Aulas</button>
            </div>
        </div>
    </div>   
</section>

@section('scripts')
<script>
    function checkChapterStatus(id,readonly)
    {
        var route='{{ route('course.course_item_toggle', ['id' => $item->course_item_group->course_id]) }}';               
        req = {
           item_id:id,
           readonly:readonly
       };               
       $.ajax({
        type: 'GET',                                                
        url: route,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: req,
        error: function(e){
            console.log(e);
        },
        success: function(response){      
            var result = $.parseJSON(response);
            var i = 0;
            for (i =0; i < result.length; ++i){
                $('#chap-'+ result[i].id).html(result[i].progressDo);
            }
        }
    });
   }

   $(document).ready(function(){                
    $('.progress-label').click(function(){
        var id=$(this).attr('for');   
        checkChapterStatus(id,false);
    });



    $(document).ready(function(){    
        $('.input-progress-label').each(function(){
            if(!$(this).is(':checked')){
                var id = $(this).attr('id');
                
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
                     var idInput = id;
                     console.log(idInput);
                 }
             }); 
                return false;     
            }
        }); 
        $('#next').click(function(){
            $('.input-progress-label').each(function(){

                var id=$(this).attr('id'); 
                alert(id);
            });

        });
    });
    $('.aula').click(function(){

        var id = $(this).attr('value');

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