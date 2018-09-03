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
             @if ($item->course_item_types_id == 1)                                   
                {{ $item->desc }}
                @if (!is_null($item->embed))
                    <span>{!! $item->embed !!}</span>
                @endif
                @foreach ($item->item_child as $child)
                    {{ $child->id }}
                @endforeach
            @else
                {{ $item->desc }}
                @if (!is_null($item->path))
                    <img src="{{ asset($item->path) }}" id="{{ $item->id }}">
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