<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="css/themes.css">
    <link rel="stylesheet" href="css/home-empresa.css">
    <title>Tabula - Ensino a distância - Cursos EAD</title>
</head>

<body class="bg-primary-rose">
    <section class="navigation-bar bg-primary-white">
        <div class="container grid-md">
            <div class="columns">
                <div class="nav-brand column col-2 col-xs-10 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <div class="dropdown">
                    <span><a href="/homeEmpresa"><img align="center" src="images/layout/header/sp.jpg" height="30px"> </a></span>
                    <div class="dropdown-content">
                    <a href="/"> <img src="images/layout/header/logo.png" height="25px"></a>
                    </div>
                    </div>
                </div>
                <div class="nav-search col-5 hide-xs col-sm-5">
                    <section class="navbar-section">
                        <div class="input-group input-inline">
                            <input class="button-tabula-rose-inverted text-white;" type="text" placeholder="Digite sua busca.">
                            <button class="button-tabula-rose">Buscar</button>
                        </div>
                    </section>
                </div>
                <div class="nav-menu col-5 col-xs-6 col-sm-4 col-md-5">
                    <div class="menu-icon show-sm">
                        <div class="icon-open"></div>
                        <div class="icon-closed"></div>
                    </div>
                    <ul class="hide-sm">
                        <li><a class="text-rose" href="/">Início</a></li>
                        <li><a class="text-rose" href="/cart">Cart</a></li>
                        <li><a class="text-rose" href="/todosProfs">Professores</a></li>
                        <li><a class="text-rose" href="/logout">Sair</a></li>
                    </ul><a href="/userPanel"> <img class="avatar" src="images/avatar-1.png" width="35px;"></a> </div>
            </div>
        </div>
        <div class="offscreen-menu show-sm bg-primary-rose">
            <div class="menu-mob">
                <ul>
                    <li><a class="text-white" href="#">Hello1</a></li>
                    <li><a class="text-white" href="#">Hello2</a></li>
                    <li><a class="text-white" href="#">Hello3</a></li>
                    <li><a class="text-white" href="#">Hello4</a></li>
                    <div class="divider"></div>
                    <li>
                        <label for="email">E-mail</label>
                        <br>
                        <input type="email" placeholder="Digite seu email" id="email">
                        <br>
                        <br>
                        <label for="password">Password</label>
                        <br>
                        <input type="password" placeholder="Digite sua senha" id="password">
                        <br>
                        <br>
                        <button class="button-tabula-rose-inverted">ENTRAR</button>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="hero-landing">
        <div class="container grid-md">
            <div class="columns bg-primary-white">
                <div class="column col-6 col-xs-12 col-sm-12 hero-text">
                    <h2 class="text-rose">A plataforma de ensino a <u>distância</u> mais <u>inovadora</u> e <u>prática</u> onde qualquer pessoa pode <u>aprender</u> ou <u>ensinar</u>.</h2>
                    <button id="explore" class="button-tabula-rose">EXPLORE</button>
                </div>
                <div class="column col-6 hide-sm hero-mock"></div>
            </div>
        </div>
    </section>
    <section class="course-gallery">
        <div class="container grid-md">
            <div class="columns">
                <a class="column  col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-rose">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-rose">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-rose">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-rose">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-rose">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="column col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 course-item">
                    <div class="columns">
                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 course-image"></div>
                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 course-content bg-primary-white text-rose">
                            <p><strong>title</strong></p>
                            <p>Desc</p>
                            <div class="course-price">
                                <p>Grátis</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container grid-md">
            <div class="columns spacer-2 bg-primary-white">
                <div class="column col-8 col-xs-12 col-sm-12 col-md-12 video-wrapper">
                    <video controls poster="images/poster-video.PNG" width="500px">
                        <source src="images/presentation-tabula.mp4"> </video>
                </div>
                <div class="about-text column col-4 col-xs-12 col-sm-12 col-md-12">
                    <p class="text-rose">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti corporis, sed aperiam! Eum quae assumenda, optio suscipit fugiat facilis minima eos doloremque nostrum, modi quis est repudiandae eveniet tempora sapiente nihil. Quo enim animi accusantium, id sint doloribus obcaecati nulla beatae rerum vero dolore culpa unde delectus at. Voluptate, ex.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="teachers">
        <div class="container grid-md"> 
        <h3>Professores</h3>
            <div class="teachers-wrapper">
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
            <div class="teacher-photo-wrapper"> 
                <a href="#"> 
                    <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                    <div class="teacher-description">
                        <p>Nome do professor</p>
                    </div>
                </a>
            </div>
        </div>
            </div>
    </section>

    <footer class="bg-primary-white">
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-4"></div>
                <div class="column col-4"></div>
                <div class="column col-4"></div>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>
