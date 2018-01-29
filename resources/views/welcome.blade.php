@extends('layouts.front')
@section('content')
    <section class="hero-wrapper">
        <div class="hero-text">
            <h1>A mais simples e inovadora plataforma de ensino a distância</h1>
            <button class="tabula-button-inverted">Descubra</button>
        </div>
        <div class="presentation-video"></div>
    </section>
    <h1 style="color: #404040; margin-top: 120px; text-align: center;">MACROTEMAS</h1>
    <section class="macrotemas-mobile">
        <div class="hex-col-1">
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex1-alt-mob.svg">
                    <p>Finanças e Economia</p> <img class="macro-icon" src="images/financaseeconcomia-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex5-alt-mob.svg">
                    <p>Controladoria e Contabilidade</p> <img class="macro-icon" src="images/controladoriaecontabilidade-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex6-alt-mob.svg">
                    <p>T.I. e Softwares</p> <img class="macro-icon" src="images/tiesoftwares-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex11-alt-mob.svg">
                    <p>Saúde</p> <img class="macro-icon" src="images/saude-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex12-alt-mob.svg">
                    <p>História e Artes</p> <img class="macro-icon" src="images/historiaearte-icon.svg" style="display: none;"> </a>
            </div>
        </div>
        <div class="hex-col-2">
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex2-alt-mob.svg">
                    <p>Varejo e Consumo</p> <img class="macro-icon" src="images/varejoeconsumo-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex4-alt-mob.svg">
                    <p>Direito</p> <img class="macro-icon" src="images/direito-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex7-alt-mob.svg">
                    <p>Marketing</p> <img class="macro-icon" src="images/marketing-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex10-alt-mob.svg">
                    <p>Arquitetura e Design</p> <img class="macro-icon" src="images/arquiteturaedesign-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex12-alt-mob.svg">
                    <p>Ensino Médio e Fundamental</p> <img class="macro-icon" src="images/ensinomedioefundamental-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex16-alt-mob.svg">
                    <p>Hobbies</p> <img class="macro-icon" src="images/hobbies-icon.svg" style="display: none;"> </a>
            </div>
        </div>
        <div class="hex-col-3">
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex3-alt-mob.svg">
                    <p>Negócio e Gestão</p> <img class="macro-icon" src="images/neogocioegestao-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex8-alt-mob.svg">
                    <p>Engenharia</p> <img class="macro-icon" src="images/engenharia-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex9-alt-mob.svg">
                    <p>Concursos e Certificação</p> <img class="macro-icon" src="images/concursosecertificados-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex14-alt-mob.svg">
                    <p>Vídeo e Fotografia</p> <img class="macro-icon" src="images/videoefotografia-icon.svg" style="display: none;"> </a>
            </div>
            <div class="hexagon">
                <a href="#" class="hex-inner"> <img src="images/hex-alt-mob/SVG/hex15-alt-mob.svg">
                    <p>Gastronomia</p> <img class="macro-icon" src="images/gastronomia-icon.svg" style="display: none;"> </a>
            </div>
        </div>
    </section>
    <section class="macrotemas-desktop">
        @for($i = 0; $i<3; $i++)
            <div class="hex-row-{{ $i+1 }}">
                @for($j = 0; $j < $row_limit; $j++)
                    <div class="hexagon">
                        <a href="{{ route('category.single', ['id' => $categories[$category_count]->id]) }}" class="hex-inner"> <img src="images/hex-alt-desktop/SVG/{{$category_count}}.svg">
                            <p>{{ $categories[$category_count]->desc }}</p> 
                            <img class="macro-icon" src="images/hex-icon/{{$category_count}}.svg" style="display: none;"> 
                        </a>
                        @php($category_count++)
                    </div>
                @endfor
                @if($row_limit == 5)
                    @php($row_limit = 6)
                @else
                    @php($row_limit = 5)
                @endif
            </div>
        @endfor
    </section>
    <section class="most-viewed-wrapper">
        <h1 style="color: #404040; margin-top: 120px; text-align: center;">MAIS VISUALIZADOS</h1>
        <p style="color: #808080; padding-left: 35px;">Vídeo populares em Finanças e Economia</p>
        <div class="carousel1">
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
        </div>
        <p style="color: #808080; padding-left: 35px;">Vídeo populares em Controladoria e Contabilidade</p>
        <div class="carousel2">
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
        </div>
    </section>
    <h1 style="color: #404040; margin-top: 120px; text-align: center;">BLOG</h1>
    <section class="blog-wrapper">
        <div class="carousel3">
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
            <a href="#" class="card">
                <p>Macrotema</p>
                <div class="card-media">
                    <div class="card-overlay"></div>
                </div>
                <p><b>Título</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed quibusdam nemo fugiat, culpa tenetur illum!</p>
            </a>
        </div>
    </section>
@endsection

{{-- @extends('layouts.front')
@section('content') 

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Macrotemas</th>
                </thead>
                <tbody>
                    @for($i = 0; $i<3; $i++)
                        @for($j = 0; $j < $row_limit; $j++)
                            <tr>
                                <td>
                                    <a href="{{ route('category.single', ['id' => $categories[$category_count]->id]) }}">
                                        <div style="height:100%;width:100%">
                                            {{ $categories[$category_count]->desc }}
                                            {{ $category_count++ }}
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endfor
                        @if($row_limit == 5)
                            @php($row_limit = 6)
                        @else
                            @php($row_limit = 5)
                        @endif
                    @endfor
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>CURSOS EM DESTAQUE EM {{ $featured_category1 }}</th>
                </thead>
                <tbody>
                    @foreach($featured_courses1 as $course)
                        <tr>
                            <td>
                                <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                    {{ $course->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>CURSOS EM DESTAQUE EM {{ $featured_category2 }}</th>
                </thead>
                <tbody>
                    @foreach($featured_courses2 as $course)
                        <tr>
                            <td>
                                <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                    {{ $course->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>BLOG</th>
                </thead>
                <tbody>
                    @foreach($featured_posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('course.single', ['id' => $post->id]) }}">
                                    {{ $post->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
 --}}