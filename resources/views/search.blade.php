@extends('layouts.front')

@section('content')
    <div class="col-lg-3">
        <form action="">
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <input type="checkbox" name="checkbox_category" value="{{ $category->id }}">
                        <label for="{{ $category->id }}"> {{ $category->desc }} ({{ $category->courses->count() }}) </label><br>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
    <div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-body">
                {{ $catgroup }}
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            $('input[name="checkbox_category"]').on('change', function()
            {

                var checkbox_category_group = [];

                $('input[name="checkbox_category"]:checked').each(function()
                {
                    checkbox_category_group.push($(this).val());
                });

                checkbox_category_group = checkbox_category_group.toString();

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '{{ URL::route('search.category') }}',
                    data: "checked_categories_output=" + checkbox_category_group,
                    success: function (response) {
                        $('.panel-body').html(response);
                    }
                });
            });
        </script>
    @stop
@endsection