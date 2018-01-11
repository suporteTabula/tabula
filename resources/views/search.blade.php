@extends('layouts.front')

@section('content')
    <div class="col-lg-3">
        <form action="">
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <input type="checkbox" name="category_checkbox" value="{{ $category->id }}">
                        <label for="{{ $category->id }}"> {{ $category->desc }} ({{ $category->courses->count() }}) </label><br>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="dynamic_serach_panel">
                    Selecione um macrotema para pesquisar.
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function(){
                $('input[name="category_checkbox"]').change(function(){

                    var checked_group = [];
                    var checked_num = 0;

                    $('input[name="category_checkbox"]:checked').each(function()
                    {
                        checked_group.push($(this).val());
                        checked_num++;
                    });

                    checked_group = checked_group.toString();    

                    $.ajax({
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '{{ route('search.category')}}',
                        data: {checked_group_output:checked_group},
                        error: function(e){
                            console.log(e);
                        },
                        success: function(response){
                            if (checked_num > 0)
                                $('#dynamic_serach_panel').html(response);
                            else 
                                $('#dynamic_serach_panel').html('Selecione um macrotema para pesquisar.');
                        }
                    });
                });
            });
        </script>
    @stop
@endsection