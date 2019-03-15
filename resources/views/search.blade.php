@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/busca.css') }}">
@endsection
@section('content')

<section class="search-wrapper">	
    <div class="search-container">
        <div class="columns ">
            <div class="column col-3 col-xs-12 col-sm-12">  
                <!--
                    <li class="macro-main__item">
                        <input type="checkbox" class="macro-main__checkbox--financas" id="financas" value="financas" name="macrotema">
                        <label for="financas">Finanças e Economia</label>
                        <ul class="macro-sub--financas">
                            <li class="macro-sub__item">
                                <input type="checkbox" class="macro-main__checkbox">Finanças Corporativas
                            </li>
                        -->
                        <ul class="macro-main">
                            @forelse($categories as $category)
                            <li class="macro-main__item">
                                <input type="checkbox" class="macro-main__checkbox--category" id="{{$category->id}}" value="{{$category->id}}" name="macrotema">
                                <label for="{{$category->id}}" class="macro-main-label">{{$category->desc}}</label>
                                <ul class="macro-sub--category">
                                    @forelse($category->parent_categories as $parent_category)
                                    <li class="macro-sub__item">
                                        <input type="checkbox" name="subtema" class="macro-main__checkbox" id="{{$parent_category->id}}" value="{{$parent_category->id}}" data-macro-main="{{$parent_category->category_id_parent}}">
                                        <label for="{{$parent_category->id}}">{{$parent_category->desc}}</label>
                                    </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>

                    <div class="column col-9 col-xs-12 col-sm-12">
                        <div class="side-search">
                            <form action="{{ route('search.single', ['id' => -1]) }}" method="get" enctype="multipart/form-data">
                                <?php
                                if(isset($_GET['search_string'])){
                                    $search_string = $_GET['search_string'];
                                } else {
                                    $search_string = '';
                                }
                                ?>
                                <input id="search_string" class="input-tabula-white" name="search_string" type="text" placeholder="Digite sua busca." value="{{$search_string}}">
                                <button class="button-tabula-gray" type="submit">Buscar</button>
                            </form>
                        </div>

                        <div class="divider text-center" data-content="Resultados"></div>

                        <div class="search-toggle-container">
                            <span class="list-style-buttons">
                                <a href="#" id="gridview" class="switcher active"><img src="{{asset('/images/grid-view-active.png')}}" alt="Grid"></a>
                                <a href="#" id="listview" class="switcher"><img src="{{asset('/images/list-view.png')}}" alt="List"></a>
                            </span>     
                        </div>

                        <div class="columns" id="search-results">
                            @if (count($courses) > 0)
                            @foreach($courses as $course)
                            @if($course->avaliable == 1)
                            <ul class="clearfix grid" id="courses">
                                <li class="clearfix">
                                    <div class="course-card-search" id="course-card">                          
                                        <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                            <section class="left">                                  
                                                <div class="course-card__image">
                                                 <img src="../images/aulas/{{$course->thumb_img}}" class="thumb" />
                                             </div>
                                         </section>
                                         <section class="right">
                                            <div class="course-card__description" id="course-card-desc">
                                                <p class="lineclamp-title"><strong>{{ $course->name }}</strong></p>
                                                <p class="lineclamp-desc">{{ $course->desc }}</p>
                                            </div>                          
                                            <div class="course-card__price" id="course-card-price">R${{number_format($course->price, 2,',', '.')}}</div>
                                        </section>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        @endif
                        @endforeach                
                        @else
                        Não existem cursos das opções selecionadas.
                        @endif                         
                    </div>

                </div>
            </div>	
        </div>
    </section>
    <script src="{{ asset('js/main.js')}}"></script>
</section>   
@section('scripts')
<script>          
    $(document).ready(function(){

                // a cada click em qualquer checkbox ou no botao de procurar
                $('input[name="macrotema"], input[name="subtema"], #search_btn').click(function(){

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
                        var count_sub_checked = 0;
                        var count_sub_total = 0;

                        // Faz a contagem de quantas subcategorias da categoria principal estão selecionadas
                        $('input[name="subtema"][data-macro-main="'+$(this).val()+'"]').each(function(){
                            if($(this).is(':checked')){
                                count_sub_checked++;
                            }
                            count_sub_total++;
                        });

                        // Se não for selecionada nenhuma ou todas as subcategorias para filtro
                        if(count_sub_checked == 0 || count_sub_total == count_sub_checked){
                            // Adiciona a categoria principal na busca
                            checked_group.push($(this).val());
                            checked_num++;
                            // Adiciona todas as subcategorias na busca
                            $('input[name="subtema"][data-macro-main="'+$(this).val()+'"]').each(function(){
                                checked_group.push($(this).val());
                                checked_num++;
                            });
                        } else {
                            $('input[name="subtema"][data-macro-main="'+$(this).val()+'"]').each(function(){
                                if($(this).is(':checked')){
                                    checked_group.push($(this).val());
                                    checked_num++;
                                }
                            });
                        }
                    });

                    checked_group = checked_group.toString();
                    
                    // pega o valor do campo de busca (string)
                    var course_title = $('#search_string').val();
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