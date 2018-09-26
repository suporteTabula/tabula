@if (isset($items))
    <ul>
        @foreach ($items as $item)
            @if ($item->course_item_types_id >= 5)
                
                <form action="{{ route('course.answer', ['id' => $item->id]) }} " method="post" enctype="multipart/form-data"> <!--FORM PASSANDO ID DO ITEM PRA SALVAR EM ORDEM AS ALTERNATIVAS-->
                    {{ csrf_field() }}
                    
                    @foreach ($item->item_child as $child)
                        @if ($child->course_item_types_id == 6 || $child->course_item_types_id == 9)
                             @if ($child->desc)
                                <label>{{ $child->desc }}</label><br/>  
                            @else
                                <label>Descrição não disponível</label><br/><br/>
                            @endif
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
                             @if ($child->desc)
                                <label>{{ $child->desc }}</label><br/>  
                            @else
                                <label>Descrição não disponível</label><br/>
                            @endif
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
             @if ($item->course_item_types_id == 1)                                   
                {{ $item->desc }}
                @if (!is_null($item->embed))
                    <span>{!! $item->embed !!}</span>
                @endif
                @foreach ($item->item_child as $child)
                <br/>
                <form action="{{ route('course.answer', ['id' => $item->id]) }} " method="post" enctype="multipart/form-data"> <!--FORM PASSANDO ID DO ITEM PRA SALVAR EM ORDEM AS ALTERNATIVAS-->
                    {{ csrf_field() }}
                @if ($child->course_item_types_id == 6 || $child->course_item_types_id == 9)
                             @if ($child->name)
                                <h5>{{ $child->name }}</h5>
                            @endif
                             @if ($child->desc)
                                <label>{{ $child->desc }}</label><br/><br/>  
                            @else
                                <label>Descrição não disponível</label><br/><br/>
                            @endif
                            @foreach ($child->course_item_options as $options)
                                @if ($child->course_item_types_id == 6)
                                    <input type="hidden"  name="multiple_{{$options->course_item->id}}[]" value="0">
                                    <input type="checkbox" class="squaredTwo" name="multiple_{{$options->course_item->id}}[]" id="{{ $child->id }}" value="{{$options->id}}"> {{ $options->desc}}                                    
                                    <br/>
                                @elseif ($child->course_item_types_id == 9)
                                    <input type="hidden" name="alternativa_{{$options->course_item->id}}[]" value="0">
                                    <input type="radio" name="alternativa_{{$options->course_item->id}}[]" id="{{ $child->id }}" value="{{$options->id}}"> 
                                    <label for="{{ $child->id }}">{{ $options->desc}}</label>
                                    <br/>
                                @endif   
                            @endforeach
                        @else
                            @if ($child->name)
                                <h5>{{ $child->name }}</h5>
                            @endif
                             @if ($child->desc)
                                <label>{{ $child->desc }}</label><br/><br/>  
                            @else
                                <label>Descrição não disponível</label><br/><br/>
                            @endif
                            @if ($child->course_item_types_id == 5)
                                <input type="text" name="dissertativa_{{$child->id}}"><br> 
                            @else
                                <input type="hidden" name="trueFalse_{{$child->id}}" value="">
                                <input type="radio" name="trueFalse_{{$child->id}}" id="true_{{ $child->id }}" value="1">
                                <label for="true_{{ $child->id }}">Verdadeira</label><br/>
                                <input type="radio" name="trueFalse_{{$child->id}}" id="false_{{ $child->id }}" value="0">
                                <label for="false_{{ $child->id }}">Falsa</label><br/>
                             @endif
                        @endif
                @endforeach
                <br/>
                <input type="submit" name="next" id="next" value="Enviar avaliação">
                </form>
            @else
                {{ $item->desc }}
                @if (!is_null($item->path))
                    <img src="{{ asset($item->path) }}" id="{{ $item->id }}">
                @endif
                @foreach ($item->item_child as $child)
                    {{ $child->id }}
                @endforeach
            @endif                                
            @endif
        @endforeach
    </ul>
@endif