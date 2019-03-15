@extends('layouts.user')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection
@section('content')
<section class="resumee">
    <div class="container grid-lg"><!--falta essa-->
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

                            <a href="{{route('beTeacher')}}">
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
                                <button id="taught" class="button-normal">Cursos Minha Empresa</button>
                            </a>
                            <a href="#">
                                <button id="myTeacher" class="button-normal">Meus Professores</button>
                            </a>                            
                            @else
                            <a href="#"> 
                                <button id="data" class="button-normal button-selected">Dados Pessoais</button>
                            </a>
                            <a href="#">
                                <button id="courses" class="button-normal">Meus Cursos</button>
                            </a>
                            @if($myCourse == 0)
                            <a href="{{route('course.create.teacher')}}">
                                <button class="button-normal" style="background-color:Tomato;">Criar Curso</button>
                            </a>    
                            @else
                            <a href="#">
                                <button id="taught" class="button-normal">Cursos que Leciono</button>
                            </a>

                            @endif
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
                            </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                @if($auth->userTypes()->first()->id != 5)
                                <label for="sexo"><b>Sexo</b></label>
                                <select id="sex" name="sex" class="form-control">
                                    <option value="Feminino" @if($auth->sex == 'Feminino') selected @endif> Feminino </option>
                                    <option value="Masculino" @if($auth->sex == 'Masculino') selected @endif> Masculino </option>
                                </select>
                                <br>
                                <br>
                                @endif
                                <label for="state"><b>Estado</b></label>
                                <select id="state" name="state_id" class="form-control">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" @if($auth->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                @endforeach
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
                                <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $auth->twitter }}">
                            </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <label for="facebook"><b>Facebook</b></label>
                                <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $auth->facebook }}">
                                <br>
                                <br>
                                <label for="google_plus"><b>Google +</b></label>
                                <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $auth->google_plus }}">
                            </div>
                            <div class="column col-xs-12 col-sm-12 col-12">
                                <h4>Dados de pagamento</h4>
                            </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <label for="address"><b>Endereço</b></label>
                                <input class="form-control" name="address" placeholder="Endereço" type="text" value="{{ $auth->address }}">
                                <br>
                                <br>
                                <label for="number"><b>Número</b></label>
                                <input class="form-control" type="text" name="number" placeholder="Seu Número" value="{{ $auth->number }}">
                            </div>
                            <div class="column col-xs-12 col-sm-12 col-6">
                                <label for="city"><b>Cidade</b></label>
                                <input class="form-control" type="text" name="city" placeholder="Sua Cidade" value="{{ $auth->city }}">
                                <br>
                                <br>
                                <label for="cep"><b>CEP</b></label>
                                <input class="form-control" type="text" name="cep" placeholder="Seu CEP" value="{{ $auth->cep }}">
                                <br>
                                <br>
                                <label for="cpf"><b>CPF</b></label>
                                <input class="form-control" type="text" name="cpf" placeholder="Seu CPF" value="{{ $auth->cpf }}">
                            </div>
                            <div class="column col-1"></div>
                            <div class="column col-10 save-button">
                                <p><b>Deseja salvar as alterações?</b></p>
                                <button class="button-tabula" type="submit" form="teste">Salvar</button>
                            </div class="column col-1">
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
                                <div class="course-card__image">
                                    <img src="{{asset('images/aulas')}}/{{$course->thumb_img}}" class="thumb" />
                                </div>
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
            <!--Lecionados-->
            <div id="panel-3" class="columns">
                <div class="column col-12">

                    <div class="columns">
                        <div class="course-card">
                            <a href="{{route('course.create.teacher')}}">
                                <div class="course-card__image" >
                                    <img class="card_img" src="{{url('/images/img/more.png')}}">
                                </div>
                                <div class="course-card__description">

                                </div>
                            </a>
                        </div>
                        @if($company == null)
                            @foreach($courses as $course)
                                @if ($course->user_id_owner == $auth->id)<br> 
                                <div class="course-card">
                                    <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                        <div class="course-card__image">
                                            <img  src="{{asset('images/aulas')}}/{{$course->thumb_img}}" class="thumb" />
                                        </div>
                                        <div class="course-card__description">
                                            <p>{{ $course->name }}</p>
                                            <p>{{ $course->desc }}</p>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        @else
                            @foreach($users as $user)
                                @foreach($user->courses as $course)
                                <div class="course-card">
                                    <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                        <div class="course-card__image" style="background-image: url({{url('/images/aulas/')}}.{{$course->thumb_img}});"></div>
                                        <div class="course-card__description">
                                            <p>{{ $course->name }}</p>
                                            <p>{{ $course->desc }}</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>                                
                </div>
            </div>
            <!--Meus Professores-->
            <div id="panel-7"  style="display: none;" class="columns">
                <div class="column col-12">
                    <div class="columns">
                        <div class="course-card">
                            <a href="{{route('teachers.company.create')}}">
                                <div class="course-card__image" >
                                    <img class="card_img" src="{{url('/images/img/more.png')}}">
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
</div>

</section>

@endsection