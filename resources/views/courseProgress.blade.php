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
                                    <span class="round">
                                        <input type="checkbox" name="chap-{{ $chapter->id }}" id="chap-{{ $chapter->id }}" disabled>                               
                                        <label class="chap-progress-label" for="chap-{{ $chapter->id }}"></label>
                                        <input type="hidden" name="chap-{{ $chapter->id }}-courseID" id="chap-{{ $chapter->id }}-courseID" value="{{ $chapter->course_id }}"/>
                                    </span>
                                </summary>
                                @foreach ($chapter->course_items as $item)
                                    @if(is_null($item->course_items_parent))
                                        <div id="accbody" class="accordion-body"> <a id="accbody-content" class="aula" value="{{ $item->id }}">{{ $item->name }}</a>
                                            <span class="round">
                                                <input type="checkbox" name="progress" id="{{ $item->id }}" 
                                                @foreach ($users->items as $i)
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
                                                    <input type="hidden" name="trueFalse_{{$child->id}}" value="text">
                                                    <input type="radio" name="trueFalse_{{$child->id}}" value="1">Verdadeira
                                                    <input type="radio" name="trueFalse_{{$child->id}}" value="0">Falsa<br>
                                                 @endif
                                            @endif
                                        @endforeach
                                        <input type="submit" name="next" id="next" value="Enviar avaliação">
                                    </form>
                                @else 
                                    @if ($item->course_item_types == 1)                                   
                                        {{ $item->desc }}
                                        @if (!is_null($item->embed))
                                            {!! $item->embed !!}
                                        @else
                                            <video controls>
                                                <source src="{!! $item->path !!}" type="video/mp4">
                                                    Your browser does not support html5 videos
                                            </video>
                                        @endif
                                        @foreach ($item->item_child as $child)
                                            {{ $child->id }}
                                        @endforeach
                                    @endif                                    
                                    <form action="{{ route('course.start', ['id' => $item->course_item_group->course_id]) }}" method="get" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <input type="hidden" id="item_id" name="item_id" value="{{$item->id}}">
                                        <input type="submit" name="next" value="Finalizar aula">
                                    </form>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="column col-2 course-controls">                    
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
										response = response.replace(/\s/g,'');
										var status = response.split("-");    
										var elementID = status[0];
										var elementStatus = status[1];  
										var input = 'input[name=chap-'+elementID+']';                                                                                                             
										
										if(elementStatus == 'false')
											$('input[name=chap-'+elementID+']').prop( "checked", false );
										else
											$('input[name=chap-'+elementID+']').prop( "checked", true );
										
									}
								});
							}

							$(document).ready(function(){                
								$('.progress-label').click(function(){
									var id=$(this).attr('for');   
									checkChapterStatus(id,false);
								});

								$('#open-class').click(function() {
									$(".chap-progress-label").each(function(){
										var id=$(this).attr('for');                        
										var chapID = id.split("-");
										chapID = chapID[1];
										var courseID = $('#chap-'+chapID+'-courseID').attr('value');                        
										checkChapterStatus(courseID,true);
									})
								})

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