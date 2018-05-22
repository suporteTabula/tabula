@extends('layouts.user')

@section('styles')
        <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection
@section('content')
<section class="resumee">
        <div class="container grid-lg">
            <div class="columns">
                <div class="column col-1"></div>
                <div class="column col-10 resumee-inner">
                    <div class="columns">
                        <div class="column col-12">
                            <div class="column col-12">
                                <div class="user-face"></div> <span>Nome do usuário</span> </div>
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
                        <form>
                            <!--Painel 1 - dados pessoais-->
                            <div class="column col-12 ">
                                <div class="columns">
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="name"><b>Nome</b></label>
                                        <input type="text" placeholder="Digite seu nome">
                                        <br>
                                        <br>
                                        <label for="pais"><b>País</b></label>
                                        <select name="pais">
                                            <option> Qual país você mora? </option>
                                        </select>
                                        <br>
                                        <br>
                                        <label for="estado"><b>Estado</b></label>
                                        <select name="estado">
                                            <option> Qual estado você mora? </option>
                                        </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="sobrenome"><b>Sobrenome</b></label>
                                        <input type="text" placeholder="Digite seu sobrenome">
                                        <br>
                                        <br>
                                        <label for="apelido"><b>Apelido</b></label>
                                        <input type="text" placeholder="Digite seu apelido">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select>
                                            <option> Masculino </option>
                                            <option> Feminino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="mensagem"><b>Fale mais sobre você</b></label>
                                        <textarea name="mensagem"></textarea>
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="website"><b>Website</b></label>
                                        <input type="url" placeholder="Digite sua URL" name="website">
                                        <br>
                                        <br>
                                        <label for="twitter"><b>Twitter</b></label>
                                        <input type="url" placeholder="Digite sua URL" name="twitter"> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="facebook"><b>Facebook</b></label>
                                        <input type="url" placeholder="Digite sua URL" name="facebook">
                                        <br>
                                        <br>
                                        <label for="google"><b>Google +</b></label>
                                        <input type="url" placeholder="Digite sua URL" name="google"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--meus cursos-->
                    <div id="panel-2" class="columns">
                        <div class="column col-12">
                            <div class="columns">
                                <a class="column  col-3 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 course-item">
                                    <div class="columns">
                                        <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 col-12 course-image"></div>
                                        <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 col-12  course-content bg-primary-gray text-white">
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
                    <!--Lecionados-->
                    <div id="panel-3" class="columns">
                        <div class="column col-12">
                            <div class="columns">
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
                                    <p>dados</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tornar-se prof-->
                    <div id="panel-6" class="columns">
                        <div class="column col-12">
                            <div class="columns">
                                <div class="column col-12">
                                    <p>tornar-se prof</p>
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
                    <button class="button-tabula">Salvar</button>
                </div>
                <div class="column col-1"></div>
            </div>
        </div>
    </section>
@endsection