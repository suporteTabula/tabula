@if (isset($items))
    <ul>
        @foreach ($items as $item)
            @if ($item->course_item_types_id >= 6)
                
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
                        @if ($child->course_item_types_id == 10)
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
                    @if (!is_null($item->embed))
                        <h1>{{$item->name}}</h1>
                        <span>{!! $item->embed !!}</span>
                        <h4>{{$item->desc}}</h4>
                    @endif
                @elseif($item->course_item_types_id ==2)
                <div class="img-course-progess">
                    <h1>{{$item->name}}</h1>
                    <img src="{{ asset($item->path) }}" id="{{ $item->id }}" class="course-asset">
                    <h4>{{$item->desc}}</h4>
                </div>
                @elseif($item->course_item_types_id == 4)
                <div class="audio-course">
                    <h1>{{$item->name}}</h1>
                    <audio src="{{asset('')}}/{{$item->path}}" controls loop>
                        <p>Seu navegador não suporta o elemento audio </p>
                    </audio>
                    <h4>{{$item->desc}}</h4>
                </div>
                @elseif($item->course_item_types_id == 5)
                <div>
                    <a href="{{asset('')}}/{{$item->path}}" download="">download</a>
                </div>
                @else
                    <h3>{{$item->name}}</h3>
                    <p>{{ $item->desc }}</p>
                    @if (!is_null($item->path))
                        <img src="{{ asset($item->path) }}" id="{{ $item->id }}" class="course-asset">
                    @endif
                @endif                                
            @endif
        @endforeach
    </ul>
@endif