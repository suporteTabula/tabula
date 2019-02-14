@extends('layouts.user')
@section('content')
    <section class="hero-landing">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-12 col-xs-12 col-sm-12 hero-text">
                    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "autoPlay": 2500, "pageDots": false, "draggable": false}'>
                        <div class="carousel-cell--1">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'financas-e-economia') }}"></a>
                        </div>
                        <div class="carousel-cell--2">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'varejo-e-consumo') }}"></a>
                        </div>
                        <div class="carousel-cell--3">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'negocio-e-gestao') }}"></a>
                        </div>
                        <div class="carousel-cell--4">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'direito') }}"></a>
                        </div>
                        <div class="carousel-cell--5">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'controladoria-e-contabilidade') }}"></a>
                        </div>
                        <div class="carousel-cell--6">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'ti-e-softwares') }}"></a>
                        </div>
                        <div class="carousel-cell--7">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'marketing') }}"></a>
                        </div>
                        <div class="carousel-cell--8">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'engenharia') }}"></a>
                        </div>
                        <div class="carousel-cell--9">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'concursos-e-certificacao') }}"></a>
                        </div>
                        <div class="carousel-cell--10">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'arquitetura-e-design') }}"></a>
                        </div>
                        <div class="carousel-cell--11">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'saude') }}"></a>
                        </div>
                        <div class="carousel-cell--12">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'historia-e-arte') }}"></a>
                        </div>
                        <div class="carousel-cell--13">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'ensino-medio-e-fundamental') }}"></a>
                        </div>
                        <div class="carousel-cell--14">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'video-e-fotografia') }}"></a>
                        </div>
                        <div class="carousel-cell--15">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'gastronomia') }}"></a>
                        </div>
                        <div class="carousel-cell--16">
                            <a id="carousel-redirect" href="{{ url('categoria/' . 'hobbies') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <section class="macrotemas">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-12 show-md">
                    <div class="macro-mobile-wrapper">
                        @for($i = 0; $i<3; $i++)
                            <div class="macrotema-col-{{ $i+1 }}">
                                @for($j = 0; $j < $mobile_col_limit; $j++)
                                    <a href="{{ route('search.single', ['id' => $mobile_categories[$mobile_category_count]->id]) }}" style="background-image: url({{ '../images/hex/mobile/'.$mobile_categories[$mobile_category_count]->mobile_hex_bg }})">
                                        <p id="macro-title">{{ $mobile_categories[$mobile_category_count]->desc }}</p> 
                                        <img id="macroicon" src="{{ asset('images/hex/icon/'.$mobile_categories[$mobile_category_count]->hex_icon) }}" style="display: none;"> 
                                    </a>
                                    @php($mobile_category_count++)
                                    
                                @endfor
                                @if($mobile_col_limit == 5)
                                    @php($mobile_col_limit = 6)
                                @else
                                    @php($mobile_col_limit = 5)
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="column col-12 hide-md">
                    <div class="macro-pc-wrapper hide-md">
                        @for($i = 0; $i<3; $i++)
                            <div class="macro-row-{{ $i+1 }}">
                                @for($j = 0; $j < $row_limit; $j++)
                                    <div class="macro-indv-pc">
                                        <a href="{{ url('categoria/' . $categories[$category_count]->urn) }}" style="background-image: url({{ '../images/hex/desktop/'.$categories[$category_count]->desktop_hex_bg }})">
                                            <p>{{ $categories[$category_count]->desc }}</p> 
                                            <img id="macroicon" src="{{ asset('images/hex/icon/'.$categories[$category_count]->hex_icon) }}" style="display: none;"> 
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-4 col-xs-12 col-sm-12">
                    <div class="columns spacer card-advantage1">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <img src="{{asset('/images/layout/home/hexagon.svg')}}" width="70px;">
                        </div>
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>O Tábula possui uma plataforma inédita e fácil de usar, com cursos das mais diversas áreas do conhecimento.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12 ">
                    <div class="columns spacer card-advantage2">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <img src="{{asset('/images/layout/home/hexagon.svg')}}" width="70px;">
                        </div>
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <p>Para os alunos, há a disponibilidade de aprender e assistir aulas dos mais variados temas no tempo que quiser. Já aos professores, oferecemos a assessoria necessária, com salas para gravação e a edição destas.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12">
                    <div class="columns spacer card-advantage3">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12  hex-adv">
                            <img src="{{asset('/images/layout/home/hexagon.svg')}}" width="70px;">
                        </div>
                        <div class="column col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                            <p>Leve o Tábula para dentro de sua emrpesa através da realização de parcerias conosco. Procuramos realizar contratos com instituições de ensino que procuram crescer e disseminar uma educação de qualidade.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="highlighted-courses">
        <div class="container grid-md">
            <div class="columns">
            <h5>Cursos em destaque: {{ $featured_category1 }}</h5>
                <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
                    @foreach ($featured_courses1 as $course)
                    <div class="course-card">
                        <a href="{{ route('course.single', ['id' => $course->id]) }}">
                            <div class="course-card__image" style="background-image: url(../images/aulas/{{$course->thumb_img}});"></div>
                            <div class="course-card__description">
                                <p>{{ $course->name }}</p>
                                <p>{{ $course->desc }}</p>
                                <div class="course-card__price">{{ $course->price }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div><br>
                <h5>Cursos em destaque: Varejo e Consumo</h5>
                <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
                    @foreach($featured_courses2 as $course)
                    <div class="course-card">
                        <a href="{{ route('course.single', ['id' => $course->id]) }}">
                            <div class="course-card__image" style="background-image: url(../images/aulas/{{$course->thumb_img}});"></div>
                            <div class="course-card__description">
                                <p>{{ $course->name }}</p>
                                <p>{{ $course->desc }}</p>
                                <div class="course-card__price">{{ $course->price }}</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <script>
        $('.highlighted-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
    </script>
    <section class="about">

        <div class="container grid-md">
            <div class="columns spacer-2">
                <div class="column col-12"> 
                    <video controls poster="../images/layout/home/poster-video.PNG" width="500px">
                        <source src="{{asset('/images/layout/home/presentation-tabula.mp4')}}">
                    </video>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('.highlighted-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
    </script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    @section('scripts')
        <script src="{{ asset('js/clamp.min.js') }}"></script>
        
        <script>
            var title = document.getElementsByClassName("lineclamp-title");
            var desc = document.getElementsByClassName("lineclamp-desc");

            $clamp(title, {clamp: 1, useNativeClamp: false});
            $clamp(desc, {clamp: 3});
        </script>
    @endsection
@endsection

