<body>
        <section class="navigation-bar">
        <div class="container grid-md">
            <div class="columns">
                <div class="nav-brand column col-2 col-xs-10 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <a href="http://localhost:8000"><img src="http://localhost:8000/images/layout/header/logo.svg" height="30px"></a>
                </div>
                <div class="nav-search col-6 hide-xs hide-sm col-md-4 col-lg-5 col-xl-6">
                    <section class="navbar-section">
                        <div class="input-group input-inline">
                            <form action="http://localhost:8000/search/-1" method="get" enctype="multipart/form-data">
                                <input class="" name="search_string" type="text" placeholder="Digite sua busca.">
                                <button class="button-tabula" type="submit">Buscar</button>
                            </form>
                        </div>
                    </section>
                </div>

<section class="hero-landing">
        <div class="container grid-md">
            <div class="columns bg-primary-white">
                <div class="column col-6 col-xs-12 col-sm-12 hero-text">
                    <h2 class="text-{{$company->theme_color}}">A plataforma de ensino a <u>distância</u> mais <u>inovadora</u> e <u>prática</u> onde qualquer pessoa pode <u>aprender</u> ou <u>ensinar</u>.</h2>
                    <button id="explore" class="button-tabula-{{$company->theme_color}}">EXPLORE</button>
                </div>
                <div class="column col-6 hide-sm hero-mock"></div>
            </div>
        </div>
    </section>
                <center><div class="column col-5 col-xs-12 col-sm-12 col-md-6 video-preview">
                    <video controls poster="../images/layout/home/poster-video.PNG" width="500px">
                        <source src="../images/layout/home/presentation-tabula.mp4"> </video></center>
                                  
                    </div>
                </div>
</body>                    