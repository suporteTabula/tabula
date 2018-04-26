@extends('layouts.user')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
@endsection
@section('content')
    <section class="search-wrapper">
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-12 side-search">
                    <input id="course_title" type="text" placeholder="Faça sua busca" value="{{ $search_string }}" class="button-tabula">
                    <button id="search_btn" class="button-tabula">Buscar</button>
                    <div class="divider text-center" data-content="Busca Avançada"></div>
                    <div class="columns">
                        @for ($i = 0; $i < 2 ; $i++)
                            <div class="column col-6">
                                <ul>
                                    @for ($j = 0; $j < 8; $j++)
                                        <li><label><input 
                                            @if (isset($checked_category)) 
                                                @if ($checked_category->id == $categories[$category_count]->id) 
                                                  checked 
                                                @endif 
                                            @endif 
                                        type="checkbox" name="macrotema" value="{{ $categories[$category_count]->id }}"> {{ $categories[$category_count]->desc }}</label></li>
                                            @php($category_count++)
                                    @endfor
                                </ul>
                            </div>
                        @endfor                      
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-gallery">
        <div class="container grid-lg">
           <div class="divider text-center" data-content="Resultados"></div>
            <div class="columns" id="search-results">
                @if (count($courses) > 0)
                    @foreach($courses as $course)
                        <a href="{{ route('course.single', ['id' => $course->id]) }}" class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 course-item">
                            <div class="columns">
                                <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image" style="background-image: url(../images/aulas/{{$course->thumb_img}});"></div>
                                <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-gray text-white">
                                    <p><strong>{{ $course->name }}</strong></p>
                                    <p>{{ $course->desc }}</p>
                                    <div class="course-price">
                                        <p>{{ $course->price }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach                
                @else
                    Não existem cursos das opções selecionadas.
                @endif                         
            </div>
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
                            $('#search-results').html(response);
                        }
                    });
                });
            });
        </script>
    @stop
@endsection