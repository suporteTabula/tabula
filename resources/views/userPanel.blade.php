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
                          <div>
                            <img src="{{ asset('/images/Profilepic')}}/{{$auth->avatar}}" class="img-profile">
                        </div>
                        <span>{{ $auth->name}}</span>               
                    </div>       
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
                            @foreach ($auth->userTypes as $userType)
                            <?php $tipo = $userType->desc; ?>
                            @endforeach
                            @if($tipo == 'Aluno') 
                            <a href="#">
                                <button id="data" class="button-normal button-selected">Dados Pessoais</button>
                            </a>
                            <a href="#">
                                <button id="courses" class="button-normal">Meus Cursos</button>
                            </a>
                            <a href="#">
                                <button id="payment" class="button-normal">Dados de Pagamento</button>
                            </a>
                            <a href="#">
                                <button id="teacher" class="button-normal">Tornar-se Professor</button>
                            </a>
                            @elseif($tipo == 'Empresa')
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
                                <button id="myTeacher" class="button-normal">Meus Professores</button>
                            </a>                            
                            <a href="#">
                                <button id="create" class="button-normal">Criar Curso</button>
                            </a>
                            <a href="#">
                                <button id="payment" class="button-normal">Dados de Pagamento</button>
                            </a>
                            @else
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
                            @endif
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
                <form id="teste" action="{{ route('userProfile.update') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="user-face2">
                       <label>Escolha a Foto De Perfil</label>
                       <input type="file" name="avatar">
                   </div>
                   <!--Painel 1 - dados pessoais-->
                   <div class="column col-12 ">
                    <div class="columns">
                        <div class="column col-xs-12 col-sm-12 col-6">
                            <label for="name"><b>Nome</b></label>
                            <input class="form-control" name="name" placeholder="Seu nome" type="text" value="{{ $auth->name }}">
                            <br>
                            <br>
                            <label for="country"><b>País</b></label>
                            <select id="country" name="country_id" class="form-control">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($auth->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <label for="state"><b>Estado</b></label>
                            <select id="state" name="state_id" class="form-control">
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}" @if($auth->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                @endforeach
                            </select>
                            <br>
                            <br> </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <label for="last_name"><b>Sobrenome</b></label>
                                <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $auth->last_name }}">
                                <br>
                                <br>
                                <label for="nickname"><b>Apelido</b></label>
                                <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $auth->nickname }}">
                                <br>
                                <br>
                                <label for="sexo"><b>Sexo</b></label>
                                <select id="sex" name="sex" class="form-control">
                                    <option value="Feminino" @if($auth->sex == 'Feminino') selected @endif> Feminino </option>
                                    <option value="Masculino" @if($auth->sex == 'Masculino') selected @endif> Masculino </option>
                                </select>
                            </div>
                            <div class="column col-12">
                                <label for="bio"><b>Conte-nos um pouco sobre você:</b></label>
                                <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $auth->bio }}</textarea>
                            </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <label for="website"><b>Website</b></label>
                                <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $auth->website }}">
                                <br>
                                <br>
                                <label for="twitter"><b>Twitter</b></label>
                                <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $auth->twitter }}"> </div>
                                <div class="column col-xs-12 col-sm-12 col-6">
                                    <label for="facebook"><b>Facebook</b></label>
                                    <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $auth->facebook }}">
                                    <br>
                                    <br>
                                    <label for="google_plus"><b>Google +</b></label>
                                    <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $auth->google_plus }}"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--meus cursos-->
                    <div id="panel-2" class="columns">
                        <div class="column col-12">
                            <div class="columns">

                               @foreach($auth->courses as $course)
                               <div class="course-card">
                                <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                    <div class="course-card__image" style="background-image: url(../images/aulas/{{$course->thumb_img}});"></div>
                                    <div class="course-card__description">
                                     <p>{{ $course->name }}</p>
                                     <p>{{ $course->desc }}</p>
                                 </div>
                             </a>
                         </div>
                         @endforeach

                     </div>
                 </div>
             </div>
             @if ($auth->IsStudent())
             <b>Aluno DO TABULA</b>
             @endif
             <!--Lecionados-->
             <div id="panel-3" class="columns">
                <div class="column col-12">

                    <div class="columns">
                        <div class="course-card">
                            <a href="#">
                                <div class="course-card__image" >
                                    <img style="width: 50%" src="{{url('/images/img/more.png')}}">
                                </div>
                                <div class="course-card__description">

                                </div>
                            </a>
                        </div>
                        @foreach($courses as $course)
                        @if ($course->user_id_owner == $auth->id)<br> 
                        <div class="course-card">
                            <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                <div class="course-card__image" style="background-image: url({{url('/images/aulas/')}}.{{$course->thumb_img}});"></div>
                                <div class="course-card__description">
                                 <p>{{ $course->name }}</p>
                                 <p>{{ $course->desc }}</p>
                             </div>
                         </a>
                     </div>
                     @endif
                     @endforeach
                 </div>                                
             </div>
         </div>


         <!--criar curso-->
         <div id="panel-4" class="columns">
            <div class="column col-12">
                <div class="columns">
                    <div class="column col-12">
                        <div id="hide" class="column col-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Cadastrar novo curso
                                </div>
                                <div class="panel-body">
                                    <form action="{{ route('store.teacher') }}" enctype="multipart/form-data" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input class="form-control" type="text" id="name" name="name" placeholder="Nome do curso" >
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Descrição</label>
                                            <input class="form-control" type="text" name="desc" id="desc" placeholder="Descrição do curso">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Categoria</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option value="" selected disabled hidden>Escolha uma...</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->desc }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="featured" id="featured" value="0">

                                        </div>
                                        <div class="form-group">
                                            <label for="price">Preço</label>
                                            <input class="form-control input-price" type="text" name="price" id="price"placeholder="Preço do curso">
                                        </div>
                                        <div class="form-group">
                                            <label for="requirements">Requisitos</label>
                                            <textarea class="form-control" name="requirements" placeholder="Requisitos para o Curso"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="thumb_img">Imagem da Vitrine</label>
                                            <input class="form-control" type="file" name="thumb_img">
                                        </div>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <button class="btn btn-success" id="course-teacher" type="submit">Criar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                            <label for="name"><b>Nome</b></label>
                            <input class="form-control" name="name" placeholder="Seu nome" type="text" value="{{ $auth->name }}">
                            <br>
                            <br>
                            <label for="country"><b>País</b></label>
                            <select id="country" name="country_id" class="form-control">
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($auth->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <label for="state"><b>Estado</b></label>
                            <select id="state" name="state_id" class="form-control">
                                @foreach ($states as $state)
                                <option value="{{ $state->id }}" @if($auth->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                @endforeach
                            </select>
                            <br>
                            <br> </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <label for="last_name"><b>Sobrenome</b></label>
                                <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $auth->last_name }}">
                                <br>
                                <br>
                                <label for="nickname"><b>Apelido</b></label>
                                <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $auth->nickname }}">
                                <br>
                                <br>
                                <label for="sexo"><b>Sexo</b></label>
                                <select id="sex" name="sex" class="form-control">
                                    <option value="Feminino" @if($auth->sex == 'Feminino') selected @endif> Feminino </option>
                                    <option value="Masculino" @if($auth->sex == 'Masculino') selected @endif> Masculino </option>
                                </select>
                            </div>
                            <div class="column col-12">
                                <label for="bio"><b>Mais Informações:</b></label>
                                <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $auth->bio }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--tornar-se professor-->
            <div id="panel-6" class="columns">
                <div class="column col-12">
                    <div class="columns">
                        <div class="column col-12">
                            <p>Somos marketplace inovadora que permite aos nossos colaboradores, não apenas ampliar o alcance de alunos mas também ser remunerado de forma eficiente pelo conteúdo criado. Um de nossos diferenciais é que não somos proprietários do seu conteúdo. Somos apenas a ferramenta que permite a comercialização e a viabilização do seu curso on-line.

                                No Tabula, é você professor que tem a voz final sobre os aspectos mais relevantes do seu curso como conteúdo, métodos de avaliação e política de preço. Ao final, 65% do faturamento total do seu curso será SEU!

                            Entre em contato conosco através do formulário abaixo. Dentro de até uma semana entraremos em contato para darmos o próximo passo!</p><br>
                            <div class="columns">
                                <form method="POST" action="{{url('/professor')}}" class="form-group">
                                    {{ csrf_field() }}
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="name"><b>Nome</b></label>
                                        <input class="form-control" name="name" placeholder="Seu nome" type="text" value="{{ $auth->name }}">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @if($auth->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                            @foreach ($states as $state)
                                            <option value="{{ $state->id }}" @if($auth->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br> 
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" @if($auth->sex == 'Feminino') selected @endif> Feminino </option>
                                            <option value="Masculino" @if($auth->sex == 'Masculino') selected @endif> Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>O que te qualifica para ensinar? </b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $auth->bio }}</textarea>
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="website"><b>Website</b></label>
                                        <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $auth->website }}">
                                        <br>
                                        <br>
                                        <label for="twitter"><b>Twitter</b></label>
                                        <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $auth->twitter }}"> 
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="facebook"><b>Facebook</b></label>
                                        <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $auth->facebook }}">
                                        <br>
                                        <br>
                                        <label for="google_plus"><b>Google +</b></label>
                                        <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $auth->google_plus }}">
                                        <input type="hidden" id="id" name="id" value="{{$auth->id}}">
                                        <div class="column col-10 save-button">
                                            <button class="button-tabula" type="submit">Solicitar Professor</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--Meus Professores-->
            <div id="panel-7" class="columns">
                <div class="column col-12">
                    <div class="columns">
                            <div class="course-card">
                                <a href="#">
                                    <div class="course-card__image" >
                                        <img style="width: 50%" src="{{url('/images/img/more.png')}}">
                                    </div>
                                    <div class="course-card__description">

                                    </div>
                                </a>
                            </div>
                            @foreach($teachers as $teacher)
                            @if ($teacher->empresa_id == $auth->id)<br>
                            <div class="course-card"> 
                                <div>
                                    <img src="{{ asset('/images/Profilepic')}}/{{$teacher->avatar}}" style="object-position:50% 30% ; object-fit:cover; float:left; border-radius:100px; margin-right:25px; height: 150px; width: 150px">
                                    <p style="color: #fff">{{$teacher->name}}</p>
                                </div>
                            </div> 
                            @endif
                            @endforeach
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

@endsection