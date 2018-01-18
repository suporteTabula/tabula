@extends('layouts.front')

@section('content')
    <div class="col-lg-3">
        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item">
                    <input type="checkbox" name="search_event" value="{{ $category->id }}">
                    <label for="{{ $category->id }}"> {{ $category->desc }} ({{ $category->courses->count() }}) </label><br>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <input id="course_title" placeholder="Pesquisa por título de curso" type="text" size="75">
                <button class="btn btn-success" id="search_btn" type="button">Pesquisar</button>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="dynamic_search_panel">
                    Selecione um macrotema para pesquisar ou escreva um nome de curso.
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function(){
                $('input[name="search_event"], #search_btn').click(function(){

                    var checked_group = [];
                    var checked_num = 0;
                    var course_title;
                    var output;

                    $('input[name="search_event"]:checked').each(function()
                    {
                        checked_group.push($(this).val());
                        checked_num++;
                    });
                    checked_group = checked_group.toString();
                    
                    course_title = $('#course_title').val();
                    course_title = course_title.toString();

                    if (course_title != "" && checked_num > 0)
                        output = {any_string:true,any_check:true,checked_group_output:checked_group,course_title_output:course_title};
                    else if (course_title != "" && checked_num == 0)
                        output = {any_string:true,any_check:false,course_title_output:course_title};
                    else if (course_title == "" && checked_num > 0)
                        output = {any_string:false,any_check:true,checked_group_output:checked_group};
                    else
                        output = {any_string:false,any_check:false,};

                    $.ajax({
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '{{ route('search.category') }}',
                        data: output,
                        error: function(e){
                            console.log(e);
                        },
                        success: function(response){
                            $('#dynamic_search_panel').html(response);
                        }
                    });
                });
            });
        </script>
    @stop
@endsection