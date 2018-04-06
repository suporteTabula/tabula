@extends('layouts.user')

@section('content')
    <section class="search-wrapper">
        <div class="search-container">
            <div class="search-inputeers">
                <input id="course_title" type="text" placeholder="Faça sua busca" value="{{ $search_string }}" class="tabula-input">
                <button id="search_btn" class="tabula-button">Buscar</button>
            </div>
            <p class="adv-search"><b>Busca Avançada</b></p>
            <form class="search-checkers">
                <ul>
                    @foreach($categories as $category)
                        <li><label><input 
                            @if (isset($checked_category)) 
                                @if ($checked_category->id == $category->id) 
                                    checked 
                                @endif 
                            @endif 
                        type="checkbox" name="macrotema" value="{{ $category->id }}"> {{ $category->desc }}</label></li>
                    @endforeach
                </ul>
            </form>
        </div>
        <div class="search-results">
            @if (count($courses) > 0)
                <ul>
                    @foreach($courses as $course)
                        <a href="{{ route('course.single', ['id' => $course->id]) }}" class="card">
                            <div class="card-media" style="background-image: url(../images/aulas/{{$course->id}}.jpg);">
                                <div class="card-overlay"></div>
                            </div>
                            <p><b>{{ $course->name }}</b></p>
                        </a>
                    @endforeach
                </ul>
            @else
                Não existem cursos das opções selecionadas.
            @endif
        </div>
    </section>
    @section('scripts')
        <script>
            $(document).ready(function(){
                // a cada click em qualquer checkbox ou no botao de procurar
                $('input[name="macrotema"], #search_btn').click(function(){

                    var checked_group = [];
                    // controla a quantidade de checks, se = 0, any_check = false
                    var checked_num = 0;
                    // controla o valor do campo de busca (string), se '', any_string = false
                    var course_title;
                    // variavel que vai segurar ATRIBRUTOS extras no 'data' do ajax, e passar para o controller
                    var output;

                    // adiciona cada categoria checada no array checked_group (a cada click em qualquer checkbox ou no botao de procurar)
                    $('input[name="macrotema"]:checked').each(function()
                    {
                        checked_group.push($(this).val());
                        checked_num++;
                    });
                    checked_group = checked_group.toString();
                    
                    // pega o valor do campo de busca (string)
                    course_title = $('#course_title').val();
                    course_title = course_title.toString();

                    // verifica se existe check ou string e altera os ATRIBUTOS que serão usados pelo controller
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
                            $('.search-results').html(response);
                        }
                    });
                });
            });
        </script>
    @stop
@endsection