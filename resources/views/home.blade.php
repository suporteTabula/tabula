@extends('layouts.user')
@section('content')
    <section class="hero-landing">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-6 col-xs-12 col-sm-12 hero-text">
                    <h2>A plataforma de ensino a <u>distância</u> mais <u>inovadora</u> e <u>prática</u> onde qualquer pessoa pode <u>aprender</u> ou <u>ensinar</u>.</h2>
                    <button id="explore" class="button-tabula">EXPLORE</button>
                </div>
                <div class="column col-6 hide-sm hero-mock"></div>
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
                                        <a href="{{ route('search.single', ['id' => $categories[$category_count]->id]) }}" style="background-image: url({{ '../images/hex/desktop/'.$categories[$category_count]->desktop_hex_bg }})">
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
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-8 col-md-12 col-lg-12 col-xl-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at eius ipsam illum, amet repudiandae.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12 ">
                    <div class="columns spacer card-advantage2">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12 hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-8 col-md-12 col-lg-12 col-xl-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at eius ipsam illum, amet repudiandae.</p>
                        </div>
                    </div>
                </div>
                <div class="column col-4 col-xs-12 col-sm-12">
                    <div class="columns spacer card-advantage3">
                        <div class="column col-4 col-sm-4 col-md-12 col-lg-12 col-xl-12  hex-adv">
                            <img src="../images/layout/home/hexagon.svg" width="70px;">
                        </div>
                        <div class="column col-sm-8 col-md-12 col-lg-12 col-xl-12 ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio at eius ipsam illum, amet repudiandae.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="highlighted-courses">
        <div class="container grid-md">
            <div class="columns">
            <h5>Cursos em destaque: Finanças e Economia</h5>
            <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                </div>
                <h5>Cursos em destaque: Varejo e Consumo</h5>
                <div class="highlighted-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "groupCells": true, "pageDots": false }'>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-card__image"></div>
                        <div class="course-card__description">
                            <p>Title Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut fuga explicabo aperiam doloremque consequuntur?</p>
                            <p>Decription Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates cupiditate sequi sed fugiat nostrum voluptatibus!</p>
                            <div class="course-card__price">313123</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <<script>
        $('.highlighted-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
    </script>

    <section class="about">
        <div class="container grid-md">
            <div class="columns spacer-2">
                <div class="column col-8 col-xs-12 col-sm-12 col-md-12"> 
                    <video controls poster="../images/layout/home/poster-video.PNG" width="500px">
                        <source src="../images/layout/home/presentation-tabula.mp4">
                    </video>
                </div>
                <div class="about-text column col-4 col-xs-12 col-sm-12 col-md-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti corporis, sed aperiam! Eum quae assumenda, optio suscipit fugiat facilis minima eos doloremque nostrum, modi quis est repudiandae eveniet tempora sapiente nihil. Quo enim animi accusantium, id sint doloribus obcaecati nulla beatae rerum vero dolore culpa unde delectus at. Voluptate, ex.</p>
                </div>
            </div>
        </div>
    </section>
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

