
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="SgAYomxSZ6plxpHdI2Mz6gOEYtm4FpS1pxJrIO6A">
    <title>Perfil Professor</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
   
    <link rel="stylesheet" href="css/home-empresa.css">
                                                                            
    
    <script src="http://localhost:8000/js/card.js"></script>
   
    <link rel="stylesheet" href="http://localhost:8000/css/themes.css">
    <link rel="stylesheet" href="http://localhost:8000/css/card.css">
    
    <link rel="stylesheet" href="http://localhost:8000/css/style.css">

    <link rel="stylesheet" href="http://localhost:8000/css/pagamento.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">         
    <link rel="stylesheet" href="http://localhost:8000/css/user.css">
 </head>

<body>
    
    <section class="navigation-bar">
        <div class="container grid-md">
            <div class="columns">
                <div class="nav-brand column col-2 col-xs-10 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                    <div class="dropdown">
                    <span><a href="http://localhost:8000"><img align="center" src="images/layout/header/logo.png" height="30px"> </a></span>
                    <div class="dropdown-content">
                    <a href="/homeEmpresa"> <img src="../images/layout/header/sp.jpg" height="25px"></a>
                    </div>
                    </div>
                </div>
                <div class="nav-search col-6 col-md-4 col-lg-5 col-xl-6 hide-xs hide-sm">
                    <section class="navbar-section">
                        <div class="input-group input-inline">
                            <form action="http://localhost:8000/search/-1" method="get" enctype="multipart/form-data">
                                <input class="button-tabula-white" name="search_string" type="text" placeholder="Digite sua busca.">
                                <button class="button-tabula-gray" type="submit">Buscar</button>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="nav-menu col-4 col-xs-2 col-sm-6 col-md-5 col-lg-4 col-xl-4">
                    <a href="/userPanel">
                        
                        <img class="avatar" src="../images/avatar-1.png"> 
                    </a>
                    <ul class="show-sm">
                        <li> 
                            <div class="menu-icon">
                                <div class="icon-open"></div>
                                <div class="icon-closed"></div>
                            </div>
                        </li>
                                                
                         
                    </ul>
                    <ul class="hide-sm">
                        <li><a href="/">Início</a></li>
                        <li><a href="/cart">Cart</a></li>
                        <li><a href="/todosProfs">Professores</a></li>
                        <li><a href="/logout">Sair</a></li>
                    </ul>
                    
                </div>
            </div>
            <section style="width: 100%;">
                <div class="container grid-md" style="position: relative">
                    <div class="offscreen-menu">
                        <div class="menu-mob">
                            <ul> 
                                                                <li><a href="http://localhost:8000/userPanel">Painel</a></li>
                                <li><a href="http://localhost:8000/cart">Cart</a></li>
                                <li><a href="http://localhost:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;"><input type="hidden" name="_token" value="SgAYomxSZ6plxpHdI2Mz6gOEYtm4FpS1pxJrIO6A"></form>                             </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    
    
    <section class="resumee">

     
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 resumee-inner">
                    <div class="columns">
                          <center><h2> PERFIL DO PROFESSOR</h2>
                                <div class="column col-12">
                                <div class="teacher-photo" style="background-image: url(../images/uiface1.jpg);"></div>
                                <span>

                                
                                </span></center>
                        </div>
                    </div>
                </div>
            
            
                <div class="column col-1"></div>
           
            <div class="columns">
                
            </div>
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 panel-show">
                    <div id="panel-1" class="columns">
                        <form method="POST" action="resultProf.php">
                              <div class="column col-12 ">
                                <div class="columns">
                                    
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Nome</b></label>
                                        <input type="text" name="nome">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input type="text" name="email" placeholder="Email">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sexo" class="form-control">
                                            <option value="Feminino" > Feminino </option>
                                            <option value="Masculino"> Masculino </option>
                                        </select>

                                        <input type= "submit" name="submit" value="Enviar">
                                        <input type= "reset" name="submit2" value="Limpar">
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                    
        </body>

</html>