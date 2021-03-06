@extends('layouts.user')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
    
@endsection
@section('content')
 <section class="search-wrapper">	
        <div class="container grid-lg">
            <div class="columns ">
                <div class="column col-12 side-search">
                    <input id="input-main" type="text" class="button-tabula" placeholder="Digite sua busca.">
                    <div class="divider text-center" data-content="Busca Avançada"></div>
                    <div class="columns">
                        <div class="column col-6 col-xs-12 col-sm-12">



                            <ul class="macro-main">
                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--financas" id="financas" value="financas" name="financas">
                                    <label for="financas">Finanças e Economia</label>
                                    <ul class="macro-sub--financas">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Finanças Corporativas
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Finanças Pessoais
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Investimentos
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Matemática Financeira
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Mercado Financeiro
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Finanças Pessoais
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Investimentos
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Valuation
                                               
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--varejo" id="varejo" value="varejo" name="varejo">
                                    <label for="varejo">Varejo e Consumo</label>
                                    <ul class="macro-sub--varejo">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Cenários e Tendências
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Distribuição
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">E-commerce
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Experiência do Consumidor
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Franquias
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Marcas
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Marketing e CRM
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Operação de Varejo
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Prevenção de Perdas
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Produto
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Shopping Center
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Trade Marketing
                                        </li>                                        
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--negocio" id="negocio" value="negocio" name="negocio">
                                    <label for="negocio">Negócio e Gestão</label>
                                    <ul class="macro-sub--negocio">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Business Plan
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Contabilidade Empresarial
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Direito Societário
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Empreendedorismo
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Gestão de Pessoas
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Inteligência de Mercado
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Liderança
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Logística
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Planejamento Estratégico
                                        </li>
                                        <li class="macro-sub__item">
                                                <input type="checkbox" class="macro-main__checkbox">Planejamento Tributário
                                        </li>                                      
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--direito" id="direito" value="direito" name="direito">
                                    <label for="direito">Direito</label>
                                    <ul class="macro-sub--direito">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Ambiental
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Comercial
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Constitucional
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Empresarial
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">OAB
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Penal
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Criminal
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Societário
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Trabalhista
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Previdenciário
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Tributário
                                        </li>                                              
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--controladoria" id="controladoria" value="controladoria" name="controladoria">
                                    <label for="controladoria">Controladoria e Contabilidade</label>
                                    <ul class="macro-sub--controladoria">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Auditória Contábil
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Contabilidade de Setor Público
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Contabilidade de Custos
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Contabilidade Geral
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Controladoria
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Perícia Contábil
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Prova CRC
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Teoria da Contabilidade
                                        </li>
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--ti" id="ti" value="ti" name="ti">
                                    <label for="ti">T.I. e Softwares</label>
                                    <ul class="macro-sub--ti">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Joomla
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Microsoft Office
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Wordpress
                                        </li>
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--marketing" id="marketing" value="marketing" name="marketing">
                                    <label for="marketing">Marketing</label>
                                    <ul class="macro-sub--marketing">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Content Marketing
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">E-mail Marketing
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Gestão de Produto
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Gestão de Marketing
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Marketing para Pequenas Empresas
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Marketing Online
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Mídias Sociais
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Planejamento de Marketing
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">SEO
                                        </li>
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--engenharia" id="engenharia" value="engenharia" name="engenharia">
                                    <label for="engenharia">Engenharia</label>
                                    <ul class="macro-sub--engenharia">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Ambiental
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Ciclo Básico
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Civil
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Elétrica
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Materiais
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Mecânica
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Mecatrônica
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Produção
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Sub Química
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="column col-6 col-xs-12 col-sm-12">
                            <ul class="macro-main">
                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--concursos" id="concursos" value="concursos" name="concursos">
                                    <label for="concursos">Concursos e Certificação</label>
                                    <ul class="macro-sub--concursos">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--arquitetura" id="arquitetura" value="arquitetura" name="arquitetura">
                                    <label for="arquitetura">Arquitetura e Design</label>
                                    <ul class="macro-sub--arquitetura">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--saude" id="saude" value="saude" name="saude">
                                    <label for="saude">Saúde</label>
                                    <ul class="macro-sub--saude">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--historia" id="historia" value="historia" name="historia">
                                    <label for="historia">História e Arte</label>
                                    <ul class="macro-sub--historia">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--ensino" id="ensino" value="ensino" name="ensino">
                                    <label for="ensino">Ensino Médio e Fundamental</label>
                                    <ul class="macro-sub--ensino">
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Biologia
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Física
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Geografia
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">História
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Matemática
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Português
                                        </li>
                                        <li class="macro-sub__item">
                                            <input type="checkbox" class="macro-main__checkbox">Química
                                        </li>
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--video" id="video" value="video" name="video">
                                    <label for="video">Vídeo e Fotografia</label>
                                    <ul class="macro-sub--video">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--gastronomia" id="gastronomia" value="gastronomia" name="gastronomia">
                                    <label for="gastronomia">Gastronomia</label>
                                    <ul class="macro-sub--gastronomia">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>

                                <li class="macro-main__item">
                                    <input type="checkbox" class="macro-main__checkbox--outros" id="outros" value="outros" name="outros">
                                    <label for="hobbies">Hobbies</label>
                                    <ul class="macro-sub--hobbies">
                                        <!-- li com subtema -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        <section class="course-gallery">
        <div class="container grid-lg">
           <div class="divider text-center" data-content="Resultados"></div>
		   <div class="search-toggle-container">
				 <span class="list-style-buttons">
					<a href="#" id="gridview" class="switcher active"><img src="/images/grid-view-active.png" alt="Grid"></a>
					<a href="#" id="listview" class="switcher"><img src="/images/list-view.png" alt="List"></a>
				</span>		
			</div>
            <div class="columns" id="search-results">
                @if (count($courses) > 0)
                    @foreach($courses as $course)
					<ul class="clearfix grid" id="courses">
						<li class="clearfix">
							<div class="course-card" id="course-card">							
								<a href="{{ route('course.single', ['id' => $course->id]) }}">
								<section class="left">									
										<div class="course-card__image"><img src="../images/aulas/{{$course->thumb_img}}" class="thumb" /></div>
								</section>
								<section class="right">
									<div class="course-card__description" id="course-card-desc">
										<p class="lineclamp-title"><strong>{{ $course->name }}</strong></p>
										<p class="lineclamp-desc">{{ $course->desc }}</p>																																					
									</div>							
									<div class="course-card__price" id="course-card-price">{{ $course->price }}</div>		
								</section>
								</a>
							</div>
						</li>
					</ul>

                    @endforeach                
                @else
                    Não existem cursos das opções selecionadas.
                @endif                         
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
    </section>   
    @section('scripts')
        <script>
            $(document).ready(function(){
				 //capture the switcher trigger and assign a function to it.
				 //capturar o gatilho do switcher e atribuir uma função a ele.
				 $("a.switcher").bind("click", function(e){
					e.preventDefault();
					
					var theid = $(this).attr("id");
					var theproducts = $("ul#courses");
					var classNames = $(this).attr('class').split(' ');
					
					if($(this).hasClass("active")) {
						// if currently clicked button has the active class
						// then we do nothing!
						return false;
					} else {
						// otherwise we are clicking on the inactive button
						// and in the process of switching views!

						if(theid == "gridview") {
							$(this).addClass("active");
							$("#listview").removeClass("active");							
							$("#listview").children("img").attr("src","/images/list-view.png");
							
							//Restore the card layout to these divs
							$.each( $('ul#courses'), function(i, left) {
							   $('#course-card', left).each(function() {
									$(this).addClass("course-card");
									$(this).removeClass("course-card-list");
							   });
							   $('.lineclamp-title',left).each(function() {
								   $(this).addClass("course-card-title-list");
								   $(this).removeClass("lineclamp-title");
							   });
							   $('#course-card-desc', left).each(function() {
									$(this).addClass("course-card__description");
									$(this).removeClass("course-card-desc-list");
							   });
							   $('#course-card-price', left).each(function() {
									$(this).addClass("course-card__price");
									$(this).removeClass("course-card-price-list");
							   });
							})		
									
							var theimg = $(this).children("img");
							theimg.attr("src","/images/grid-view-active.png");
						
							// remove the list class and change to grid
							theproducts.removeClass("list");
							theproducts.addClass("grid");
						}					
						else if(theid == "listview") {
							$(this).addClass("active");							
							$("#gridview").removeClass("active");								
							$("#gridview").children("img").attr("src","/images/grid-view.png");
								
							//Remove the card layout to these divs
							$.each( $('ul#courses'), function(i, left) {
							   $('#course-card', left).each(function() {
									$(this).removeClass("course-card");
									$(this).addClass("course-card-list");
							   });
							   $('.lineclamp-title',left).each(function() {
								   $(this).removeClass("course-card-title-list");
								   $(this).addClass("lineclamp-title");
							   });
							   $('#course-card-desc', left).each(function() {
									$(this).removeClass("course-card__description");
									$(this).addClass("course-card-desc-list");
							   });
							   $('#course-card-price', left).each(function() {
									$(this).removeClass("course-card__price");
									$(this).addClass("course-card-price-list");
							   });
							})		
							var theimg = $(this).children("img");
							theimg.attr("src","/images/list-view-active.png");
								
							// remove the grid view and change to list
							theproducts.removeClass("grid")
							theproducts.addClass("list");	
						}
					}
				 });				 
						
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