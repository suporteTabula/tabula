@if (isset($items))
    
    <ul>
    
        @foreach ($items as $item)
        
            @if ($item->course_item_types_id >= 5)
                
                <form action="{{ route('course.answer', ['id' => $item->id]) }} " method="post" enctype="multipart/form-data"> <!--FORM PASSANDO ID DO ITEM PRA SALVAR EM ORDEM AS ALTERNATIVAS-->
                    {{ csrf_field() }}
                    
                    @foreach ($item->item_child as $child)
                        @if ($child->course_item_types_id == 6 || $child->course_item_types_id == 9)
                            <label>{{ $child->name }}</label><br>  
                            @foreach ($child->course_item_options as $options)
                                @if ($child->course_item_types_id == 6)
                                    <input type="checkbox" name="multiple_{{$options->course_item->id}}[]" value="{{$options->id}}"> {{ $options->desc }}<br>
                                @elseif ($child->course_item_types_id == 9)
                                    <input type="radio" name="alternativa_{{$options->course_item->id}}[]" value="{{$options->id}}"> {{ $options->desc}}<br>
                                @endif   
                            @endforeach
                        @else
                            <label>{{ $child->name }}</label><br> 
                            @if ($child->course_item_types_id == 5)
                                <input type="text" name="dissertativa_{{$child->id}}"><br> 
                            @else
                                <input type="radio" name="trueFalse_{{$child->id}}" value="1">Verdadeira
                                <input type="radio" name="trueFalse_{{$child->id}}" value="0">Falsa<br>
                             @endif
                        @endif
                    @endforeach
                    <input type="submit" name="next" id="next" value="Enviar avaliação">
                </form>
            @else
            
                {{ $item->name }}
                
                @if (!is_null($item->path))

                    <img src="{{ asset($item->path) }}">

                @endif
                
                @foreach ($item->item_child as $child)

                    {{ $child->id }}

                @endforeach
                <form action="{{ route('course.next', ['id' => $item->id]) }} " method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="submit" name="next" value="Próxima aula">
                </form>
            @endif
        @endforeach
    </ul>
@endif