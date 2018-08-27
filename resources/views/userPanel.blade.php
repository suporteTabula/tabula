
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="SgAYomxSZ6plxpHdI2Mz6gOEYtm4FpS1pxJrIO6A">
    <title>Tabula</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <link rel="stylesheet" href="http://localhost:8000/css/card-js.min.css">                                                                        
    
    <script src="http://localhost:8000/js/card.js"></script>
   
    <link rel="stylesheet" href="http://localhost:8000/css/themes.css">
    <link rel="stylesheet" href="http://localhost:8000/css/card.css">
    
    <link rel="stylesheet" href="http://localhost:8000/css/style.css">

    <link rel="stylesheet" href="http://localhost:8000/css/pagamento.css">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">         <link rel="stylesheet" href="http://localhost:8000/css/user.css">
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
                          <form action="http://localhost:8000/userPanel" method="post" enctype="multipart/form-data">
                            <input class="form-control" type="file" name="img">    
                            <input type="submit" name="enviar">                                     
                          
                                <div class="column col-12">
                                <div class="user-face" style="background-image: url(../images/capaprofile.jpg);"> </div> <span>Tabula Admin</span> 
                           </form>     
                                


                                
                                          
                                
                         </div>
                    </div>
                </div>
            
            
                <div class="column col-1"></div>
            </div>
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 user-sections">
                    <div class="columns">
                        <div class="column col-12">
                            <div class="user-face"></div>
                            <div class="columns">
                                <div class="columns col-12 sections-buttons">
                                    <a href="#">
                                        <button id="data" class="button-normal button-selected">Dados Pessoais</button>
                                    </a>
                                    <a href="#">
                                        <button id="courses" class="button-normal">Meus Cursos</button>
                                    </a>
                                    <a href="#">
                                        <button id="taught" class="button-normal">Cursos que Leciono</button>
                                    </a>
                                    <a href="#">
                                        <button id="create" class="button-normal">Criar Curso</button>
                                    </a>
                                    <a href="#">
                                        <button id="payment" class="button-normal">Dados de Pagamento</button>
                                    </a>
                                    <a href="#">
                                        <button id="teacher" class="button-normal">Tornar-se Professor</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column col-1"></div>
            </div>
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 panel-show">
                    <div id="panel-1" class="columns">
                        <form id="teste" action="http://localhost:8000/userPanel/update" method="post">
                            <input type="hidden" name="_token" value="SgAYomxSZ6plxpHdI2Mz6gOEYtm4FpS1pxJrIO6A"> 
                            <!--Painel 1 - dados pessoais-->
                            <div class="column col-12 ">
                                <div class="columns">
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="first_name"><b>Nome</b></label>
                                        <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="Tabula">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                                                                            <option value="1"  selected > Brazil </option>
                                                                                            <option value="2" > Afghanistan </option>
                                                                                            <option value="3" > Albania </option>
                                                                                            <option value="4" > Algeria </option>
                                                                                            <option value="5" > American Samoa </option>
                                                                                            <option value="6" > Andorra </option>
                                                                                            <option value="7" > Angola </option>
                                                                                            <option value="8" > Anguilla </option>
                                                                                            <option value="9" > Antarctica </option>
                                                                                            <option value="10" > Antigua and/or Barbuda </option>
                                                                                            <option value="11" > Argentina </option>
                                                                                            <option value="12" > Armenia </option>
                                                                                            <option value="13" > Aruba </option>
                                                                                            <option value="14" > Australia </option>
                                                                                            <option value="15" > Austria </option>
                                                                                            <option value="16" > Azerbaijan </option>
                                                                                            <option value="17" > Bahamas </option>
                                                                                            <option value="18" > Bahrain </option>
                                                                                            <option value="19" > Bangladesh </option>
                                                                                            <option value="20" > Barbados </option>
                                                                                            <option value="21" > Belarus </option>
                                                                                            <option value="22" > Belgium </option>
                                                                                            <option value="23" > Belize </option>
                                                                                            <option value="24" > Benin </option>
                                                                                            <option value="25" > Bermuda </option>
                                                                                            <option value="26" > Bhutan </option>
                                                                                            <option value="27" > Bolivia </option>
                                                                                            <option value="28" > Bosnia and Herzegovina </option>
                                                                                            <option value="29" > Botswana </option>
                                                                                            <option value="30" > Bouvet Island </option>
                                                                                            <option value="31" > British lndian Ocean Territory </option>
                                                                                            <option value="32" > Brunei Darussalam </option>
                                                                                            <option value="33" > Bulgaria </option>
                                                                                            <option value="34" > Burkina Faso </option>
                                                                                            <option value="35" > Burundi </option>
                                                                                            <option value="36" > Cambodia </option>
                                                                                            <option value="37" > Cameroon </option>
                                                                                            <option value="38" > Canada </option>
                                                                                            <option value="39" > Cape Verde </option>
                                                                                            <option value="40" > Cayman Islands </option>
                                                                                            <option value="41" > Central African Republic </option>
                                                                                            <option value="42" > Chad </option>
                                                                                            <option value="43" > Chile </option>
                                                                                            <option value="44" > China </option>
                                                                                            <option value="45" > Christmas Island </option>
                                                                                            <option value="46" > Cocos (Keeling) Islands </option>
                                                                                            <option value="47" > Colombia </option>
                                                                                            <option value="48" > Comoros </option>
                                                                                            <option value="49" > Congo </option>
                                                                                            <option value="50" > Cook Islands </option>
                                                                                            <option value="51" > Costa Rica </option>
                                                                                            <option value="52" > Croatia (Hrvatska) </option>
                                                                                            <option value="53" > Cuba </option>
                                                                                            <option value="54" > Cyprus </option>
                                                                                            <option value="55" > Czech Republic </option>
                                                                                            <option value="56" > Democratic Republic of Congo </option>
                                                                                            <option value="57" > Denmark </option>
                                                                                            <option value="58" > Djibouti </option>
                                                                                            <option value="59" > Dominica </option>
                                                                                            <option value="60" > Dominican Republic </option>
                                                                                            <option value="61" > East Timor </option>
                                                                                            <option value="62" > Ecudaor </option>
                                                                                            <option value="63" > Egypt </option>
                                                                                            <option value="64" > El Salvador </option>
                                                                                            <option value="65" > Equatorial Guinea </option>
                                                                                            <option value="66" > Eritrea </option>
                                                                                            <option value="67" > Estonia </option>
                                                                                            <option value="68" > Ethiopia </option>
                                                                                            <option value="69" > Falkland Islands (Malvinas) </option>
                                                                                            <option value="70" > Faroe Islands </option>
                                                                                            <option value="71" > Fiji </option>
                                                                                            <option value="72" > Finland </option>
                                                                                            <option value="73" > France </option>
                                                                                            <option value="74" > France, Metropolitan </option>
                                                                                            <option value="75" > French Guiana </option>
                                                                                            <option value="76" > French Polynesia </option>
                                                                                            <option value="77" > French Southern Territories </option>
                                                                                            <option value="78" > Gabon </option>
                                                                                            <option value="79" > Gambia </option>
                                                                                            <option value="80" > Georgia </option>
                                                                                            <option value="81" > Germany </option>
                                                                                            <option value="82" > Ghana </option>
                                                                                            <option value="83" > Gibraltar </option>
                                                                                            <option value="84" > Greece </option>
                                                                                            <option value="85" > Greenland </option>
                                                                                            <option value="86" > Grenada </option>
                                                                                            <option value="87" > Guadeloupe </option>
                                                                                            <option value="88" > Guam </option>
                                                                                            <option value="89" > Guatemala </option>
                                                                                            <option value="90" > Guinea </option>
                                                                                            <option value="91" > Guinea-Bissau </option>
                                                                                            <option value="92" > Guyana </option>
                                                                                            <option value="93" > Haiti </option>
                                                                                            <option value="94" > Heard and Mc Donald Islands </option>
                                                                                            <option value="95" > Honduras </option>
                                                                                            <option value="96" > Hungary </option>
                                                                                            <option value="97" > Hong Kong </option>
                                                                                            <option value="98" > Iceland </option>
                                                                                            <option value="99" > India </option>
                                                                                            <option value="100" > Indonesia </option>
                                                                                            <option value="101" > Iran (Islamic Republic of) </option>
                                                                                            <option value="102" > Iraq </option>
                                                                                            <option value="103" > Ireland </option>
                                                                                            <option value="104" > Israel </option>
                                                                                            <option value="105" > Italy </option>
                                                                                            <option value="106" > Ivory Coast </option>
                                                                                            <option value="107" > Jamaica </option>
                                                                                            <option value="108" > Japan </option>
                                                                                            <option value="109" > Jordan </option>
                                                                                            <option value="110" > Kazakhstan </option>
                                                                                            <option value="111" > Kenya </option>
                                                                                            <option value="112" > Kiribati </option>
                                                                                            <option value="113" > Korea, Democratic People&#039;s Republic of </option>
                                                                                            <option value="114" > Korea, Republic of </option>
                                                                                            <option value="115" > Kuwait </option>
                                                                                            <option value="116" > Kyrgyzstan </option>
                                                                                            <option value="117" > Lao People&#039;s Democratic Republic </option>
                                                                                            <option value="118" > Latvia </option>
                                                                                            <option value="119" > Lebanon </option>
                                                                                            <option value="120" > Lesotho </option>
                                                                                            <option value="121" > Liberia </option>
                                                                                            <option value="122" > Libyan Arab Jamahiriya </option>
                                                                                            <option value="123" > Liechtenstein </option>
                                                                                            <option value="124" > Lithuania </option>
                                                                                            <option value="125" > Luxembourg </option>
                                                                                            <option value="126" > Macau </option>
                                                                                            <option value="127" > Macedonia </option>
                                                                                            <option value="128" > Madagascar </option>
                                                                                            <option value="129" > Malawi </option>
                                                                                            <option value="130" > Malaysia </option>
                                                                                            <option value="131" > Maldives </option>
                                                                                            <option value="132" > Mali </option>
                                                                                            <option value="133" > Malta </option>
                                                                                            <option value="134" > Marshall Islands </option>
                                                                                            <option value="135" > Martinique </option>
                                                                                            <option value="136" > Mauritania </option>
                                                                                            <option value="137" > Mauritius </option>
                                                                                            <option value="138" > Mayotte </option>
                                                                                            <option value="139" > Mexico </option>
                                                                                            <option value="140" > Micronesia, Federated States of </option>
                                                                                            <option value="141" > Moldova, Republic of </option>
                                                                                            <option value="142" > Monaco </option>
                                                                                            <option value="143" > Mongolia </option>
                                                                                            <option value="144" > Montserrat </option>
                                                                                            <option value="145" > Morocco </option>
                                                                                            <option value="146" > Mozambique </option>
                                                                                            <option value="147" > Myanmar </option>
                                                                                            <option value="148" > Namibia </option>
                                                                                            <option value="149" > Nauru </option>
                                                                                            <option value="150" > Nepal </option>
                                                                                            <option value="151" > Netherlands </option>
                                                                                            <option value="152" > Netherlands Antilles </option>
                                                                                            <option value="153" > New Caledonia </option>
                                                                                            <option value="154" > New Zealand </option>
                                                                                            <option value="155" > Nicaragua </option>
                                                                                            <option value="156" > Niger </option>
                                                                                            <option value="157" > Nigeria </option>
                                                                                            <option value="158" > Niue </option>
                                                                                            <option value="159" > Norfork Island </option>
                                                                                            <option value="160" > Northern Mariana Islands </option>
                                                                                            <option value="161" > Norway </option>
                                                                                            <option value="162" > Oman </option>
                                                                                            <option value="163" > Pakistan </option>
                                                                                            <option value="164" > Palau </option>
                                                                                            <option value="165" > Panama </option>
                                                                                            <option value="166" > Papua New Guinea </option>
                                                                                            <option value="167" > Paraguay </option>
                                                                                            <option value="168" > Peru </option>
                                                                                            <option value="169" > Philippines </option>
                                                                                            <option value="170" > Pitcairn </option>
                                                                                            <option value="171" > Poland </option>
                                                                                            <option value="172" > Portugal </option>
                                                                                            <option value="173" > Puerto Rico </option>
                                                                                            <option value="174" > Qatar </option>
                                                                                            <option value="175" > Republic of South Sudan </option>
                                                                                            <option value="176" > Reunion </option>
                                                                                            <option value="177" > Romania </option>
                                                                                            <option value="178" > Russian Federation </option>
                                                                                            <option value="179" > Rwanda </option>
                                                                                            <option value="180" > Saint Kitts and Nevis </option>
                                                                                            <option value="181" > Saint Lucia </option>
                                                                                            <option value="182" > Saint Vincent and the Grenadines </option>
                                                                                            <option value="183" > Samoa </option>
                                                                                            <option value="184" > San Marino </option>
                                                                                            <option value="185" > Sao Tome and Principe </option>
                                                                                            <option value="186" > Saudi Arabia </option>
                                                                                            <option value="187" > Senegal </option>
                                                                                            <option value="188" > Serbia </option>
                                                                                            <option value="189" > Seychelles </option>
                                                                                            <option value="190" > Sierra Leone </option>
                                                                                            <option value="191" > Singapore </option>
                                                                                            <option value="192" > Slovakia </option>
                                                                                            <option value="193" > Slovenia </option>
                                                                                            <option value="194" > Solomon Islands </option>
                                                                                            <option value="195" > Somalia </option>
                                                                                            <option value="196" > South Africa </option>
                                                                                            <option value="197" > South Georgia South Sandwich Islands </option>
                                                                                            <option value="198" > Spain </option>
                                                                                            <option value="199" > Sri Lanka </option>
                                                                                            <option value="200" > St. Helena </option>
                                                                                            <option value="201" > St. Pierre and Miquelon </option>
                                                                                            <option value="202" > Sudan </option>
                                                                                            <option value="203" > Suriname </option>
                                                                                            <option value="204" > Svalbarn and Jan Mayen Islands </option>
                                                                                            <option value="205" > Swaziland </option>
                                                                                            <option value="206" > Sweden </option>
                                                                                            <option value="207" > Switzerland </option>
                                                                                            <option value="208" > Syrian Arab Republic </option>
                                                                                            <option value="209" > Taiwan </option>
                                                                                            <option value="210" > Tajikistan </option>
                                                                                            <option value="211" > Tanzania, United Republic of </option>
                                                                                            <option value="212" > Thailand </option>
                                                                                            <option value="213" > Togo </option>
                                                                                            <option value="214" > Tokelau </option>
                                                                                            <option value="215" > Tonga </option>
                                                                                            <option value="216" > Trinidad and Tobago </option>
                                                                                            <option value="217" > Tunisia </option>
                                                                                            <option value="218" > Turkey </option>
                                                                                            <option value="219" > Turkmenistan </option>
                                                                                            <option value="220" > Turks and Caicos Islands </option>
                                                                                            <option value="221" > Tuvalu </option>
                                                                                            <option value="222" > Uganda </option>
                                                                                            <option value="223" > Ukraine </option>
                                                                                            <option value="224" > United Arab Emirates </option>
                                                                                            <option value="225" > United Kingdom </option>
                                                                                            <option value="226" > United States </option>
                                                                                            <option value="227" > United States minor outlying islands </option>
                                                                                            <option value="228" > Uruguay </option>
                                                                                            <option value="229" > Uzbekistan </option>
                                                                                            <option value="230" > Vanuatu </option>
                                                                                            <option value="231" > Vatican City State </option>
                                                                                            <option value="232" > Venezuela </option>
                                                                                            <option value="233" > Vietnam </option>
                                                                                            <option value="234" > Virgin Islands (British) </option>
                                                                                            <option value="235" > Virgin Islands (U.S.) </option>
                                                                                            <option value="236" > Wallis and Futuna Islands </option>
                                                                                            <option value="237" > Western Sahara </option>
                                                                                            <option value="238" > Yemen </option>
                                                                                            <option value="239" > Yugoslavia </option>
                                                                                            <option value="240" > Zaire </option>
                                                                                            <option value="241" > Zambia </option>
                                                                                            <option value="242" > Zimbabwe </option>
                                                                                    </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                                                                            <option value="1"  selected > Rondônia </option>
                                                                                            <option value="2" > Acre </option>
                                                                                            <option value="3" > Amazonas </option>
                                                                                            <option value="4" > Roraima </option>
                                                                                            <option value="5" > Pará </option>
                                                                                            <option value="6" > Amapá </option>
                                                                                            <option value="7" > Tocantins </option>
                                                                                            <option value="8" > Maranhão </option>
                                                                                            <option value="9" > Piauí </option>
                                                                                            <option value="10" > Ceará </option>
                                                                                            <option value="11" > Rio Grande do Norte </option>
                                                                                            <option value="12" > Paraíba </option>
                                                                                            <option value="13" > Pernambuco </option>
                                                                                            <option value="14" > Alagoas </option>
                                                                                            <option value="15" > Sergipe </option>
                                                                                            <option value="16" > Bahia </option>
                                                                                            <option value="17" > Minas Gerais </option>
                                                                                            <option value="18" > Espírito Santo </option>
                                                                                            <option value="19" > Rio de Janeiro </option>
                                                                                            <option value="20" > São Paulo </option>
                                                                                            <option value="21" > Paraná </option>
                                                                                            <option value="22" > Santa Catarina </option>
                                                                                            <option value="23" > Rio Grande do Sul </option>
                                                                                            <option value="24" > Mato Grosso do Sul </option>
                                                                                            <option value="25" > Mato Grosso </option>
                                                                                            <option value="26" > Goiás </option>
                                                                                            <option value="27" > Distrito Federal </option>
                                                                                    </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Sobrenome</b></label>
                                        <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="Admin">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="Admin">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" > Feminino </option>
                                            <option value="Masculino"  selected > Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>Conte-nos um pouco sobre você:</b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui..."></textarea>
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="website"><b>Website</b></label>
                                        <input class="form-control" type="text" name="website" placeholder="https://..." value="">
                                        <br>
                                        <br>
                                        <label for="twitter"><b>Twitter</b></label>
                                        <input class="form-control" type="text" name="twitter" placeholder="https://..." value=""> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="facebook"><b>Facebook</b></label>
                                        <input class="form-control" type="text" name="facebook" placeholder="https://..." value="">
                                        <br>
                                        <br>
                                        <label for="google_plus"><b>Google +</b></label>
                                        <input class="form-control" type="text" name="google_plus" placeholder="https://..." value=""></div>
                                         
                                        <br>
                                        <br>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--meus cursos-->
                    <div id="panel-2" class="columns">
                        <div class="column col-12">
                            <div class="columns">
                                                            </div>
                        </div>
                    </div>
                                            <!--Lecionados-->
                        <div id="panel-3" class="columns">
                            <div class="column col-12">
                                <div class="columns">
                                    <ul>

                                    <br>
                                        <br> 

                                   <a  href="http://localhost:8000/course/1">
                                        A

                                                                                
                                                                        <br>
                                     <br> 

                                   <a href="http://localhost:8000/course/1"><br>
                                   A <br>                               
                                                                     
                                                                    </ul>
                                        <br><br><br>
                                    <a class="column  col-3 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 course-item">
                                        <div class="columns">
                                            <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 col-12 course-image"></div>
                                            <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 col-12 course-content bg-primary-gray text-white">
                                                <p><strong>title</strong></p>
                                                <p>Desc</p>
                                                <div class="course-price">
                                                    <p>Grátis</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="column  col-3 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 course-item">
                                        <div class="columns">
                                            <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 col-12 course-image"></div>
                                            <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 col-12 course-content bg-primary-gray text-white">
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
                        </div>
                        <!--criar curso-->
                        <div id="panel-4" class="columns">
                            <div class="column col-12">
                                <div class="columns">
                                    <div class="column col-12">
                                        <p>Criar curso</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--dados de pagamento-->
                    <div id="panel-5" class="columns">
                        <div class="column col-12">
                            <div class="columns">
                                <div class="column col-12">
                                    <p>dados</p><br>

                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="first_name"><b>Nome</b></label>
                                        <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="Tabula">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                                                                            <option value="1"  selected > Brazil </option>
                                                                                            <option value="2" > Afghanistan </option>
                                                                                            <option value="3" > Albania </option>
                                                                                            <option value="4" > Algeria </option>
                                                                                            <option value="5" > American Samoa </option>
                                                                                            <option value="6" > Andorra </option>
                                                                                            <option value="7" > Angola </option>
                                                                                            <option value="8" > Anguilla </option>
                                                                                            <option value="9" > Antarctica </option>
                                                                                            <option value="10" > Antigua and/or Barbuda </option>
                                                                                            <option value="11" > Argentina </option>
                                                                                            <option value="12" > Armenia </option>
                                                                                            <option value="13" > Aruba </option>
                                                                                            <option value="14" > Australia </option>
                                                                                            <option value="15" > Austria </option>
                                                                                            <option value="16" > Azerbaijan </option>
                                                                                            <option value="17" > Bahamas </option>
                                                                                            <option value="18" > Bahrain </option>
                                                                                            <option value="19" > Bangladesh </option>
                                                                                            <option value="20" > Barbados </option>
                                                                                            <option value="21" > Belarus </option>
                                                                                            <option value="22" > Belgium </option>
                                                                                            <option value="23" > Belize </option>
                                                                                            <option value="24" > Benin </option>
                                                                                            <option value="25" > Bermuda </option>
                                                                                            <option value="26" > Bhutan </option>
                                                                                            <option value="27" > Bolivia </option>
                                                                                            <option value="28" > Bosnia and Herzegovina </option>
                                                                                            <option value="29" > Botswana </option>
                                                                                            <option value="30" > Bouvet Island </option>
                                                                                            <option value="31" > British lndian Ocean Territory </option>
                                                                                            <option value="32" > Brunei Darussalam </option>
                                                                                            <option value="33" > Bulgaria </option>
                                                                                            <option value="34" > Burkina Faso </option>
                                                                                            <option value="35" > Burundi </option>
                                                                                            <option value="36" > Cambodia </option>
                                                                                            <option value="37" > Cameroon </option>
                                                                                            <option value="38" > Canada </option>
                                                                                            <option value="39" > Cape Verde </option>
                                                                                            <option value="40" > Cayman Islands </option>
                                                                                            <option value="41" > Central African Republic </option>
                                                                                            <option value="42" > Chad </option>
                                                                                            <option value="43" > Chile </option>
                                                                                            <option value="44" > China </option>
                                                                                            <option value="45" > Christmas Island </option>
                                                                                            <option value="46" > Cocos (Keeling) Islands </option>
                                                                                            <option value="47" > Colombia </option>
                                                                                            <option value="48" > Comoros </option>
                                                                                            <option value="49" > Congo </option>
                                                                                            <option value="50" > Cook Islands </option>
                                                                                            <option value="51" > Costa Rica </option>
                                                                                            <option value="52" > Croatia (Hrvatska) </option>
                                                                                            <option value="53" > Cuba </option>
                                                                                            <option value="54" > Cyprus </option>
                                                                                            <option value="55" > Czech Republic </option>
                                                                                            <option value="56" > Democratic Republic of Congo </option>
                                                                                            <option value="57" > Denmark </option>
                                                                                            <option value="58" > Djibouti </option>
                                                                                            <option value="59" > Dominica </option>
                                                                                            <option value="60" > Dominican Republic </option>
                                                                                            <option value="61" > East Timor </option>
                                                                                            <option value="62" > Ecudaor </option>
                                                                                            <option value="63" > Egypt </option>
                                                                                            <option value="64" > El Salvador </option>
                                                                                            <option value="65" > Equatorial Guinea </option>
                                                                                            <option value="66" > Eritrea </option>
                                                                                            <option value="67" > Estonia </option>
                                                                                            <option value="68" > Ethiopia </option>
                                                                                            <option value="69" > Falkland Islands (Malvinas) </option>
                                                                                            <option value="70" > Faroe Islands </option>
                                                                                            <option value="71" > Fiji </option>
                                                                                            <option value="72" > Finland </option>
                                                                                            <option value="73" > France </option>
                                                                                            <option value="74" > France, Metropolitan </option>
                                                                                            <option value="75" > French Guiana </option>
                                                                                            <option value="76" > French Polynesia </option>
                                                                                            <option value="77" > French Southern Territories </option>
                                                                                            <option value="78" > Gabon </option>
                                                                                            <option value="79" > Gambia </option>
                                                                                            <option value="80" > Georgia </option>
                                                                                            <option value="81" > Germany </option>
                                                                                            <option value="82" > Ghana </option>
                                                                                            <option value="83" > Gibraltar </option>
                                                                                            <option value="84" > Greece </option>
                                                                                            <option value="85" > Greenland </option>
                                                                                            <option value="86" > Grenada </option>
                                                                                            <option value="87" > Guadeloupe </option>
                                                                                            <option value="88" > Guam </option>
                                                                                            <option value="89" > Guatemala </option>
                                                                                            <option value="90" > Guinea </option>
                                                                                            <option value="91" > Guinea-Bissau </option>
                                                                                            <option value="92" > Guyana </option>
                                                                                            <option value="93" > Haiti </option>
                                                                                            <option value="94" > Heard and Mc Donald Islands </option>
                                                                                            <option value="95" > Honduras </option>
                                                                                            <option value="96" > Hungary </option>
                                                                                            <option value="97" > Hong Kong </option>
                                                                                            <option value="98" > Iceland </option>
                                                                                            <option value="99" > India </option>
                                                                                            <option value="100" > Indonesia </option>
                                                                                            <option value="101" > Iran (Islamic Republic of) </option>
                                                                                            <option value="102" > Iraq </option>
                                                                                            <option value="103" > Ireland </option>
                                                                                            <option value="104" > Israel </option>
                                                                                            <option value="105" > Italy </option>
                                                                                            <option value="106" > Ivory Coast </option>
                                                                                            <option value="107" > Jamaica </option>
                                                                                            <option value="108" > Japan </option>
                                                                                            <option value="109" > Jordan </option>
                                                                                            <option value="110" > Kazakhstan </option>
                                                                                            <option value="111" > Kenya </option>
                                                                                            <option value="112" > Kiribati </option>
                                                                                            <option value="113" > Korea, Democratic People&#039;s Republic of </option>
                                                                                            <option value="114" > Korea, Republic of </option>
                                                                                            <option value="115" > Kuwait </option>
                                                                                            <option value="116" > Kyrgyzstan </option>
                                                                                            <option value="117" > Lao People&#039;s Democratic Republic </option>
                                                                                            <option value="118" > Latvia </option>
                                                                                            <option value="119" > Lebanon </option>
                                                                                            <option value="120" > Lesotho </option>
                                                                                            <option value="121" > Liberia </option>
                                                                                            <option value="122" > Libyan Arab Jamahiriya </option>
                                                                                            <option value="123" > Liechtenstein </option>
                                                                                            <option value="124" > Lithuania </option>
                                                                                            <option value="125" > Luxembourg </option>
                                                                                            <option value="126" > Macau </option>
                                                                                            <option value="127" > Macedonia </option>
                                                                                            <option value="128" > Madagascar </option>
                                                                                            <option value="129" > Malawi </option>
                                                                                            <option value="130" > Malaysia </option>
                                                                                            <option value="131" > Maldives </option>
                                                                                            <option value="132" > Mali </option>
                                                                                            <option value="133" > Malta </option>
                                                                                            <option value="134" > Marshall Islands </option>
                                                                                            <option value="135" > Martinique </option>
                                                                                            <option value="136" > Mauritania </option>
                                                                                            <option value="137" > Mauritius </option>
                                                                                            <option value="138" > Mayotte </option>
                                                                                            <option value="139" > Mexico </option>
                                                                                            <option value="140" > Micronesia, Federated States of </option>
                                                                                            <option value="141" > Moldova, Republic of </option>
                                                                                            <option value="142" > Monaco </option>
                                                                                            <option value="143" > Mongolia </option>
                                                                                            <option value="144" > Montserrat </option>
                                                                                            <option value="145" > Morocco </option>
                                                                                            <option value="146" > Mozambique </option>
                                                                                            <option value="147" > Myanmar </option>
                                                                                            <option value="148" > Namibia </option>
                                                                                            <option value="149" > Nauru </option>
                                                                                            <option value="150" > Nepal </option>
                                                                                            <option value="151" > Netherlands </option>
                                                                                            <option value="152" > Netherlands Antilles </option>
                                                                                            <option value="153" > New Caledonia </option>
                                                                                            <option value="154" > New Zealand </option>
                                                                                            <option value="155" > Nicaragua </option>
                                                                                            <option value="156" > Niger </option>
                                                                                            <option value="157" > Nigeria </option>
                                                                                            <option value="158" > Niue </option>
                                                                                            <option value="159" > Norfork Island </option>
                                                                                            <option value="160" > Northern Mariana Islands </option>
                                                                                            <option value="161" > Norway </option>
                                                                                            <option value="162" > Oman </option>
                                                                                            <option value="163" > Pakistan </option>
                                                                                            <option value="164" > Palau </option>
                                                                                            <option value="165" > Panama </option>
                                                                                            <option value="166" > Papua New Guinea </option>
                                                                                            <option value="167" > Paraguay </option>
                                                                                            <option value="168" > Peru </option>
                                                                                            <option value="169" > Philippines </option>
                                                                                            <option value="170" > Pitcairn </option>
                                                                                            <option value="171" > Poland </option>
                                                                                            <option value="172" > Portugal </option>
                                                                                            <option value="173" > Puerto Rico </option>
                                                                                            <option value="174" > Qatar </option>
                                                                                            <option value="175" > Republic of South Sudan </option>
                                                                                            <option value="176" > Reunion </option>
                                                                                            <option value="177" > Romania </option>
                                                                                            <option value="178" > Russian Federation </option>
                                                                                            <option value="179" > Rwanda </option>
                                                                                            <option value="180" > Saint Kitts and Nevis </option>
                                                                                            <option value="181" > Saint Lucia </option>
                                                                                            <option value="182" > Saint Vincent and the Grenadines </option>
                                                                                            <option value="183" > Samoa </option>
                                                                                            <option value="184" > San Marino </option>
                                                                                            <option value="185" > Sao Tome and Principe </option>
                                                                                            <option value="186" > Saudi Arabia </option>
                                                                                            <option value="187" > Senegal </option>
                                                                                            <option value="188" > Serbia </option>
                                                                                            <option value="189" > Seychelles </option>
                                                                                            <option value="190" > Sierra Leone </option>
                                                                                            <option value="191" > Singapore </option>
                                                                                            <option value="192" > Slovakia </option>
                                                                                            <option value="193" > Slovenia </option>
                                                                                            <option value="194" > Solomon Islands </option>
                                                                                            <option value="195" > Somalia </option>
                                                                                            <option value="196" > South Africa </option>
                                                                                            <option value="197" > South Georgia South Sandwich Islands </option>
                                                                                            <option value="198" > Spain </option>
                                                                                            <option value="199" > Sri Lanka </option>
                                                                                            <option value="200" > St. Helena </option>
                                                                                            <option value="201" > St. Pierre and Miquelon </option>
                                                                                            <option value="202" > Sudan </option>
                                                                                            <option value="203" > Suriname </option>
                                                                                            <option value="204" > Svalbarn and Jan Mayen Islands </option>
                                                                                            <option value="205" > Swaziland </option>
                                                                                            <option value="206" > Sweden </option>
                                                                                            <option value="207" > Switzerland </option>
                                                                                            <option value="208" > Syrian Arab Republic </option>
                                                                                            <option value="209" > Taiwan </option>
                                                                                            <option value="210" > Tajikistan </option>
                                                                                            <option value="211" > Tanzania, United Republic of </option>
                                                                                            <option value="212" > Thailand </option>
                                                                                            <option value="213" > Togo </option>
                                                                                            <option value="214" > Tokelau </option>
                                                                                            <option value="215" > Tonga </option>
                                                                                            <option value="216" > Trinidad and Tobago </option>
                                                                                            <option value="217" > Tunisia </option>
                                                                                            <option value="218" > Turkey </option>
                                                                                            <option value="219" > Turkmenistan </option>
                                                                                            <option value="220" > Turks and Caicos Islands </option>
                                                                                            <option value="221" > Tuvalu </option>
                                                                                            <option value="222" > Uganda </option>
                                                                                            <option value="223" > Ukraine </option>
                                                                                            <option value="224" > United Arab Emirates </option>
                                                                                            <option value="225" > United Kingdom </option>
                                                                                            <option value="226" > United States </option>
                                                                                            <option value="227" > United States minor outlying islands </option>
                                                                                            <option value="228" > Uruguay </option>
                                                                                            <option value="229" > Uzbekistan </option>
                                                                                            <option value="230" > Vanuatu </option>
                                                                                            <option value="231" > Vatican City State </option>
                                                                                            <option value="232" > Venezuela </option>
                                                                                            <option value="233" > Vietnam </option>
                                                                                            <option value="234" > Virgin Islands (British) </option>
                                                                                            <option value="235" > Virgin Islands (U.S.) </option>
                                                                                            <option value="236" > Wallis and Futuna Islands </option>
                                                                                            <option value="237" > Western Sahara </option>
                                                                                            <option value="238" > Yemen </option>
                                                                                            <option value="239" > Yugoslavia </option>
                                                                                            <option value="240" > Zaire </option>
                                                                                            <option value="241" > Zambia </option>
                                                                                            <option value="242" > Zimbabwe </option>
                                                                                    </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                                                                            <option value="1"  selected > Rondônia </option>
                                                                                            <option value="2" > Acre </option>
                                                                                            <option value="3" > Amazonas </option>
                                                                                            <option value="4" > Roraima </option>
                                                                                            <option value="5" > Pará </option>
                                                                                            <option value="6" > Amapá </option>
                                                                                            <option value="7" > Tocantins </option>
                                                                                            <option value="8" > Maranhão </option>
                                                                                            <option value="9" > Piauí </option>
                                                                                            <option value="10" > Ceará </option>
                                                                                            <option value="11" > Rio Grande do Norte </option>
                                                                                            <option value="12" > Paraíba </option>
                                                                                            <option value="13" > Pernambuco </option>
                                                                                            <option value="14" > Alagoas </option>
                                                                                            <option value="15" > Sergipe </option>
                                                                                            <option value="16" > Bahia </option>
                                                                                            <option value="17" > Minas Gerais </option>
                                                                                            <option value="18" > Espírito Santo </option>
                                                                                            <option value="19" > Rio de Janeiro </option>
                                                                                            <option value="20" > São Paulo </option>
                                                                                            <option value="21" > Paraná </option>
                                                                                            <option value="22" > Santa Catarina </option>
                                                                                            <option value="23" > Rio Grande do Sul </option>
                                                                                            <option value="24" > Mato Grosso do Sul </option>
                                                                                            <option value="25" > Mato Grosso </option>
                                                                                            <option value="26" > Goiás </option>
                                                                                            <option value="27" > Distrito Federal </option>
                                                                                    </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Sobrenome</b></label>
                                        <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="Admin">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="Admin">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" > Feminino </option>
                                            <option value="Masculino"  selected > Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>Mais Informações:</b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tornar-se prof-->
                    <div id="panel-6" class="columns">
                        <div class="column col-12">
                            <div class="columns">
                                <div class="column col-12">
                                    <p>Tornar-se Professor</p><br>
                                     <div class="columns">
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="first_name"><b>Nome</b></label>
                                        <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="Tabula">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                                                                            <option value="1"  selected > Brazil </option>
                                                                                            <option value="2" > Afghanistan </option>
                                                                                            <option value="3" > Albania </option>
                                                                                            <option value="4" > Algeria </option>
                                                                                            <option value="5" > American Samoa </option>
                                                                                            <option value="6" > Andorra </option>
                                                                                            <option value="7" > Angola </option>
                                                                                            <option value="8" > Anguilla </option>
                                                                                            <option value="9" > Antarctica </option>
                                                                                            <option value="10" > Antigua and/or Barbuda </option>
                                                                                            <option value="11" > Argentina </option>
                                                                                            <option value="12" > Armenia </option>
                                                                                            <option value="13" > Aruba </option>
                                                                                            <option value="14" > Australia </option>
                                                                                            <option value="15" > Austria </option>
                                                                                            <option value="16" > Azerbaijan </option>
                                                                                            <option value="17" > Bahamas </option>
                                                                                            <option value="18" > Bahrain </option>
                                                                                            <option value="19" > Bangladesh </option>
                                                                                            <option value="20" > Barbados </option>
                                                                                            <option value="21" > Belarus </option>
                                                                                            <option value="22" > Belgium </option>
                                                                                            <option value="23" > Belize </option>
                                                                                            <option value="24" > Benin </option>
                                                                                            <option value="25" > Bermuda </option>
                                                                                            <option value="26" > Bhutan </option>
                                                                                            <option value="27" > Bolivia </option>
                                                                                            <option value="28" > Bosnia and Herzegovina </option>
                                                                                            <option value="29" > Botswana </option>
                                                                                            <option value="30" > Bouvet Island </option>
                                                                                            <option value="31" > British lndian Ocean Territory </option>
                                                                                            <option value="32" > Brunei Darussalam </option>
                                                                                            <option value="33" > Bulgaria </option>
                                                                                            <option value="34" > Burkina Faso </option>
                                                                                            <option value="35" > Burundi </option>
                                                                                            <option value="36" > Cambodia </option>
                                                                                            <option value="37" > Cameroon </option>
                                                                                            <option value="38" > Canada </option>
                                                                                            <option value="39" > Cape Verde </option>
                                                                                            <option value="40" > Cayman Islands </option>
                                                                                            <option value="41" > Central African Republic </option>
                                                                                            <option value="42" > Chad </option>
                                                                                            <option value="43" > Chile </option>
                                                                                            <option value="44" > China </option>
                                                                                            <option value="45" > Christmas Island </option>
                                                                                            <option value="46" > Cocos (Keeling) Islands </option>
                                                                                            <option value="47" > Colombia </option>
                                                                                            <option value="48" > Comoros </option>
                                                                                            <option value="49" > Congo </option>
                                                                                            <option value="50" > Cook Islands </option>
                                                                                            <option value="51" > Costa Rica </option>
                                                                                            <option value="52" > Croatia (Hrvatska) </option>
                                                                                            <option value="53" > Cuba </option>
                                                                                            <option value="54" > Cyprus </option>
                                                                                            <option value="55" > Czech Republic </option>
                                                                                            <option value="56" > Democratic Republic of Congo </option>
                                                                                            <option value="57" > Denmark </option>
                                                                                            <option value="58" > Djibouti </option>
                                                                                            <option value="59" > Dominica </option>
                                                                                            <option value="60" > Dominican Republic </option>
                                                                                            <option value="61" > East Timor </option>
                                                                                            <option value="62" > Ecudaor </option>
                                                                                            <option value="63" > Egypt </option>
                                                                                            <option value="64" > El Salvador </option>
                                                                                            <option value="65" > Equatorial Guinea </option>
                                                                                            <option value="66" > Eritrea </option>
                                                                                            <option value="67" > Estonia </option>
                                                                                            <option value="68" > Ethiopia </option>
                                                                                            <option value="69" > Falkland Islands (Malvinas) </option>
                                                                                            <option value="70" > Faroe Islands </option>
                                                                                            <option value="71" > Fiji </option>
                                                                                            <option value="72" > Finland </option>
                                                                                            <option value="73" > France </option>
                                                                                            <option value="74" > France, Metropolitan </option>
                                                                                            <option value="75" > French Guiana </option>
                                                                                            <option value="76" > French Polynesia </option>
                                                                                            <option value="77" > French Southern Territories </option>
                                                                                            <option value="78" > Gabon </option>
                                                                                            <option value="79" > Gambia </option>
                                                                                            <option value="80" > Georgia </option>
                                                                                            <option value="81" > Germany </option>
                                                                                            <option value="82" > Ghana </option>
                                                                                            <option value="83" > Gibraltar </option>
                                                                                            <option value="84" > Greece </option>
                                                                                            <option value="85" > Greenland </option>
                                                                                            <option value="86" > Grenada </option>
                                                                                            <option value="87" > Guadeloupe </option>
                                                                                            <option value="88" > Guam </option>
                                                                                            <option value="89" > Guatemala </option>
                                                                                            <option value="90" > Guinea </option>
                                                                                            <option value="91" > Guinea-Bissau </option>
                                                                                            <option value="92" > Guyana </option>
                                                                                            <option value="93" > Haiti </option>
                                                                                            <option value="94" > Heard and Mc Donald Islands </option>
                                                                                            <option value="95" > Honduras </option>
                                                                                            <option value="96" > Hungary </option>
                                                                                            <option value="97" > Hong Kong </option>
                                                                                            <option value="98" > Iceland </option>
                                                                                            <option value="99" > India </option>
                                                                                            <option value="100" > Indonesia </option>
                                                                                            <option value="101" > Iran (Islamic Republic of) </option>
                                                                                            <option value="102" > Iraq </option>
                                                                                            <option value="103" > Ireland </option>
                                                                                            <option value="104" > Israel </option>
                                                                                            <option value="105" > Italy </option>
                                                                                            <option value="106" > Ivory Coast </option>
                                                                                            <option value="107" > Jamaica </option>
                                                                                            <option value="108" > Japan </option>
                                                                                            <option value="109" > Jordan </option>
                                                                                            <option value="110" > Kazakhstan </option>
                                                                                            <option value="111" > Kenya </option>
                                                                                            <option value="112" > Kiribati </option>
                                                                                            <option value="113" > Korea, Democratic People&#039;s Republic of </option>
                                                                                            <option value="114" > Korea, Republic of </option>
                                                                                            <option value="115" > Kuwait </option>
                                                                                            <option value="116" > Kyrgyzstan </option>
                                                                                            <option value="117" > Lao People&#039;s Democratic Republic </option>
                                                                                            <option value="118" > Latvia </option>
                                                                                            <option value="119" > Lebanon </option>
                                                                                            <option value="120" > Lesotho </option>
                                                                                            <option value="121" > Liberia </option>
                                                                                            <option value="122" > Libyan Arab Jamahiriya </option>
                                                                                            <option value="123" > Liechtenstein </option>
                                                                                            <option value="124" > Lithuania </option>
                                                                                            <option value="125" > Luxembourg </option>
                                                                                            <option value="126" > Macau </option>
                                                                                            <option value="127" > Macedonia </option>
                                                                                            <option value="128" > Madagascar </option>
                                                                                            <option value="129" > Malawi </option>
                                                                                            <option value="130" > Malaysia </option>
                                                                                            <option value="131" > Maldives </option>
                                                                                            <option value="132" > Mali </option>
                                                                                            <option value="133" > Malta </option>
                                                                                            <option value="134" > Marshall Islands </option>
                                                                                            <option value="135" > Martinique </option>
                                                                                            <option value="136" > Mauritania </option>
                                                                                            <option value="137" > Mauritius </option>
                                                                                            <option value="138" > Mayotte </option>
                                                                                            <option value="139" > Mexico </option>
                                                                                            <option value="140" > Micronesia, Federated States of </option>
                                                                                            <option value="141" > Moldova, Republic of </option>
                                                                                            <option value="142" > Monaco </option>
                                                                                            <option value="143" > Mongolia </option>
                                                                                            <option value="144" > Montserrat </option>
                                                                                            <option value="145" > Morocco </option>
                                                                                            <option value="146" > Mozambique </option>
                                                                                            <option value="147" > Myanmar </option>
                                                                                            <option value="148" > Namibia </option>
                                                                                            <option value="149" > Nauru </option>
                                                                                            <option value="150" > Nepal </option>
                                                                                            <option value="151" > Netherlands </option>
                                                                                            <option value="152" > Netherlands Antilles </option>
                                                                                            <option value="153" > New Caledonia </option>
                                                                                            <option value="154" > New Zealand </option>
                                                                                            <option value="155" > Nicaragua </option>
                                                                                            <option value="156" > Niger </option>
                                                                                            <option value="157" > Nigeria </option>
                                                                                            <option value="158" > Niue </option>
                                                                                            <option value="159" > Norfork Island </option>
                                                                                            <option value="160" > Northern Mariana Islands </option>
                                                                                            <option value="161" > Norway </option>
                                                                                            <option value="162" > Oman </option>
                                                                                            <option value="163" > Pakistan </option>
                                                                                            <option value="164" > Palau </option>
                                                                                            <option value="165" > Panama </option>
                                                                                            <option value="166" > Papua New Guinea </option>
                                                                                            <option value="167" > Paraguay </option>
                                                                                            <option value="168" > Peru </option>
                                                                                            <option value="169" > Philippines </option>
                                                                                            <option value="170" > Pitcairn </option>
                                                                                            <option value="171" > Poland </option>
                                                                                            <option value="172" > Portugal </option>
                                                                                            <option value="173" > Puerto Rico </option>
                                                                                            <option value="174" > Qatar </option>
                                                                                            <option value="175" > Republic of South Sudan </option>
                                                                                            <option value="176" > Reunion </option>
                                                                                            <option value="177" > Romania </option>
                                                                                            <option value="178" > Russian Federation </option>
                                                                                            <option value="179" > Rwanda </option>
                                                                                            <option value="180" > Saint Kitts and Nevis </option>
                                                                                            <option value="181" > Saint Lucia </option>
                                                                                            <option value="182" > Saint Vincent and the Grenadines </option>
                                                                                            <option value="183" > Samoa </option>
                                                                                            <option value="184" > San Marino </option>
                                                                                            <option value="185" > Sao Tome and Principe </option>
                                                                                            <option value="186" > Saudi Arabia </option>
                                                                                            <option value="187" > Senegal </option>
                                                                                            <option value="188" > Serbia </option>
                                                                                            <option value="189" > Seychelles </option>
                                                                                            <option value="190" > Sierra Leone </option>
                                                                                            <option value="191" > Singapore </option>
                                                                                            <option value="192" > Slovakia </option>
                                                                                            <option value="193" > Slovenia </option>
                                                                                            <option value="194" > Solomon Islands </option>
                                                                                            <option value="195" > Somalia </option>
                                                                                            <option value="196" > South Africa </option>
                                                                                            <option value="197" > South Georgia South Sandwich Islands </option>
                                                                                            <option value="198" > Spain </option>
                                                                                            <option value="199" > Sri Lanka </option>
                                                                                            <option value="200" > St. Helena </option>
                                                                                            <option value="201" > St. Pierre and Miquelon </option>
                                                                                            <option value="202" > Sudan </option>
                                                                                            <option value="203" > Suriname </option>
                                                                                            <option value="204" > Svalbarn and Jan Mayen Islands </option>
                                                                                            <option value="205" > Swaziland </option>
                                                                                            <option value="206" > Sweden </option>
                                                                                            <option value="207" > Switzerland </option>
                                                                                            <option value="208" > Syrian Arab Republic </option>
                                                                                            <option value="209" > Taiwan </option>
                                                                                            <option value="210" > Tajikistan </option>
                                                                                            <option value="211" > Tanzania, United Republic of </option>
                                                                                            <option value="212" > Thailand </option>
                                                                                            <option value="213" > Togo </option>
                                                                                            <option value="214" > Tokelau </option>
                                                                                            <option value="215" > Tonga </option>
                                                                                            <option value="216" > Trinidad and Tobago </option>
                                                                                            <option value="217" > Tunisia </option>
                                                                                            <option value="218" > Turkey </option>
                                                                                            <option value="219" > Turkmenistan </option>
                                                                                            <option value="220" > Turks and Caicos Islands </option>
                                                                                            <option value="221" > Tuvalu </option>
                                                                                            <option value="222" > Uganda </option>
                                                                                            <option value="223" > Ukraine </option>
                                                                                            <option value="224" > United Arab Emirates </option>
                                                                                            <option value="225" > United Kingdom </option>
                                                                                            <option value="226" > United States </option>
                                                                                            <option value="227" > United States minor outlying islands </option>
                                                                                            <option value="228" > Uruguay </option>
                                                                                            <option value="229" > Uzbekistan </option>
                                                                                            <option value="230" > Vanuatu </option>
                                                                                            <option value="231" > Vatican City State </option>
                                                                                            <option value="232" > Venezuela </option>
                                                                                            <option value="233" > Vietnam </option>
                                                                                            <option value="234" > Virgin Islands (British) </option>
                                                                                            <option value="235" > Virgin Islands (U.S.) </option>
                                                                                            <option value="236" > Wallis and Futuna Islands </option>
                                                                                            <option value="237" > Western Sahara </option>
                                                                                            <option value="238" > Yemen </option>
                                                                                            <option value="239" > Yugoslavia </option>
                                                                                            <option value="240" > Zaire </option>
                                                                                            <option value="241" > Zambia </option>
                                                                                            <option value="242" > Zimbabwe </option>
                                                                                    </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                                                                            <option value="1"  selected > Rondônia </option>
                                                                                            <option value="2" > Acre </option>
                                                                                            <option value="3" > Amazonas </option>
                                                                                            <option value="4" > Roraima </option>
                                                                                            <option value="5" > Pará </option>
                                                                                            <option value="6" > Amapá </option>
                                                                                            <option value="7" > Tocantins </option>
                                                                                            <option value="8" > Maranhão </option>
                                                                                            <option value="9" > Piauí </option>
                                                                                            <option value="10" > Ceará </option>
                                                                                            <option value="11" > Rio Grande do Norte </option>
                                                                                            <option value="12" > Paraíba </option>
                                                                                            <option value="13" > Pernambuco </option>
                                                                                            <option value="14" > Alagoas </option>
                                                                                            <option value="15" > Sergipe </option>
                                                                                            <option value="16" > Bahia </option>
                                                                                            <option value="17" > Minas Gerais </option>
                                                                                            <option value="18" > Espírito Santo </option>
                                                                                            <option value="19" > Rio de Janeiro </option>
                                                                                            <option value="20" > São Paulo </option>
                                                                                            <option value="21" > Paraná </option>
                                                                                            <option value="22" > Santa Catarina </option>
                                                                                            <option value="23" > Rio Grande do Sul </option>
                                                                                            <option value="24" > Mato Grosso do Sul </option>
                                                                                            <option value="25" > Mato Grosso </option>
                                                                                            <option value="26" > Goiás </option>
                                                                                            <option value="27" > Distrito Federal </option>
                                                                                    </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Sobrenome</b></label>
                                        <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="Admin">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="Admin">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" > Feminino </option>
                                            <option value="Masculino"  selected > Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>Mais Informações:</b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui..."></textarea>
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="website"><b>Website</b></label>
                                        <input class="form-control" type="text" name="website" placeholder="https://..." value="">
                                        <br>
                                        <br>
                                        <label for="twitter"><b>Twitter</b></label>
                                        <input class="form-control" type="text" name="twitter" placeholder="https://..." value=""> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="facebook"><b>Facebook</b></label>
                                        <input class="form-control" type="text" name="facebook" placeholder="https://..." value="">
                                        <br>
                                        <br>
                                        <label for="google_plus"><b>Google +</b></label>
                                        <input class="form-control" type="text" name="google_plus" placeholder="https://..." value=""></div>
                                </div>
                            </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column col-1"></div>
            </div>
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 save-button">
                   <p><b>Deseja salvar as alterações?</b></p>
                    <button class="button-tabula" type="submit" form="teste">Salvar</button>
                </div>
                <div class="column col-1"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container grid-md">
            <div class="columns">
                <div class="column col-4"></div>
                <div class="column col-4"></div>
                <div class="column col-4"></div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="http://localhost:8000/js/app.js"></script>
    <script src="http://localhost:8000/js/main.js"></script>
    <script src="http://localhost:8000/js/app.js"></script>
    <script src="http://localhost:8000/js/toastr.min.js"></script>
   
    

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://localhost:8000/js/jquery.bxslider.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        if (Session::has('success')) toastr.success("")@ endif@
        if (Session::has('info')) toastr.info("")@ endif
    </script>  
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </body>

</html>