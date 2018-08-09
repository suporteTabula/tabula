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
                                <div class="user-face" style="background-image: url(../images/avatar-1.png);"></div> <span>{{ $user->first_name}} {{ $user->last_name }}</span> </div>
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
                        <form id="teste" action="{{ route('userProfile.update') }}" method="post">
                            {{ csrf_field() }} 
                            <!--Painel 1 - dados pessoais-->
                            <div class="column col-12 ">
                                <div class="columns">
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="first_name"><b>Nome</b></label>
                                        <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="{{ $user->first_name }}">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" @if($user->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}" @if($user->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Sobrenome</b></label>
                                        <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $user->last_name }}">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $user->nickname }}">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" @if($user->sex == 'Feminino') selected @endif> Feminino </option>
                                            <option value="Masculino" @if($user->sex == 'Masculino') selected @endif> Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>Conte-nos um pouco sobre você:</b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $user->bio }}</textarea>
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="website"><b>Website</b></label>
                                        <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $user->website }}">
                                        <br>
                                        <br>
                                        <label for="twitter"><b>Twitter</b></label>
                                        <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $user->twitter }}"> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="facebook"><b>Facebook</b></label>
                                        <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $user->facebook }}">
                                        <br>
                                        <br>
                                        <label for="google_plus"><b>Google +</b></label>
                                        <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $user->google_plus }}"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--meus cursos-->
                    <div id="panel-2" class="columns">
                        <div class="column col-12">
                            <div class="columns">
                                @foreach($user->courses as $course)
                                    <a class="column  col-3 col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 course-item" href="{{ route('course.single', ['id' => $course->id]) }}">
                                        <div class="columns">
                                            <div class="column col-xs-4 col-sm-4 col-md-12 col-xl-12 col-lg-12 col-12 course-image"></div>
                                            <div class="column col-xs-8 col-sm-8 col-md-12 col-xl-12 col-lg-12 col-12  course-content bg-primary-gray text-white">
                                                <p><strong>{{ $course->name }}</strong></p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($user->IsStudent())
                        <b>Aluno DO TABULA</b>
                    @endif
                        <!--Lecionados-->
                        <div id="panel-3" class="columns">
                            <div class="column col-12">
                                <div class="columns">
                                    <ul>

                                    @foreach ($courses as $course)<br>
                                        @if ($course->user_id_owner == $user->id)<br> 

                                   <a  href="{{ route('course.single', ['id' => $course->id]) }}">
                                        {{($course->name)}}

                                        @endif

                                    @endforeach
                                    @foreach ($courses as $course)<br>
                                         @if ($course->user_id_owner == $user->id)<br> 
                                   <a href="{{ route('course.single', ['id' => $course->id]) }}"><br>
                                   {{$course->name}} <br>                               
                                   @endif
                                  
                                @endforeach
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
                                        <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="{{ $user->first_name }}">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" @if($user->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}" @if($user->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Sobrenome</b></label>
                                        <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $user->last_name }}">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $user->nickname }}">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" @if($user->sex == 'Feminino') selected @endif> Feminino </option>
                                            <option value="Masculino" @if($user->sex == 'Masculino') selected @endif> Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>Mais Informações:</b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $user->bio }}</textarea>
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
                                        <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="{{ $user->first_name }}">
                                        <br>
                                        <br>
                                        <label for="country"><b>País</b></label>
                                        <select id="country" name="country_id" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}" @if($user->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                        <label for="state"><b>Estado</b></label>
                                        <select id="state" name="state_id" class="form-control">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}" @if($user->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="last_name"><b>Sobrenome</b></label>
                                        <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $user->last_name }}">
                                        <br>
                                        <br>
                                        <label for="nickname"><b>Apelido</b></label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $user->nickname }}">
                                        <br>
                                        <br>
                                        <label for="sexo"><b>Sexo</b></label>
                                        <select id="sex" name="sex" class="form-control">
                                            <option value="Feminino" @if($user->sex == 'Feminino') selected @endif> Feminino </option>
                                            <option value="Masculino" @if($user->sex == 'Masculino') selected @endif> Masculino </option>
                                        </select>
                                    </div>
                                    <div class="column col-12">
                                        <label for="bio"><b>Mais Informações:</b></label>
                                        <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $user->bio }}</textarea>
                                    </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="website"><b>Website</b></label>
                                        <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $user->website }}">
                                        <br>
                                        <br>
                                        <label for="twitter"><b>Twitter</b></label>
                                        <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $user->twitter }}"> </div>
                                    <div class="column col-xs-12 col-sm-12 col-6">
                                        <label for="facebook"><b>Facebook</b></label>
                                        <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $user->facebook }}">
                                        <br>
                                        <br>
                                        <label for="google_plus"><b>Google +</b></label>
                                        <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $user->google_plus }}"></div>
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
@endsection