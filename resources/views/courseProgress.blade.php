@extends('layouts.user')

@section('content')
   <section class="search-wrapper">
        <div class="search-container">
            @foreach ($chapters as $chapter)
                {{ $chapter->name }}<br>
                @foreach ($chapter->course_items as $item)
                    @if(is_null($item->course_items_parent))
                        <a class="teste" value="{{ $item->id }}"> {{ $item->name }} </a>
                        <form class="search-checkers">
                            <ul>
                                <li><input type="checkbox" name="progress"></li>
                            </ul>
                        </form>
                        <br>
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="search-results">
        </div>
    </section>

    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.teste').click(function(){

                    var id = $(this).attr('value');  
                    //console.log(id);

                    req = {item_id:id};
                    $.ajax({
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '{{ route('course.progress') }}',
                        data: req,
                        error: function(e){
                            console.log(e);
                        },
                        success: function(response){
                            $('.search-results').html(response);
                        }
                    });                    
                });
            });
        </script>
    @stop
@endsection