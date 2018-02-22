@extends('layouts.user')

@section('content')
    <br><br><br>
    <p><b>Usuário: {{$user->login}}</b></p>
    <p><a href="{{ route('userPanel.single') }}">Painel</a></p>
    <p><a href="{{ route('userProfile.single') }}">Perfil</a></p>


    <form action="{{ route('userProfile.update') }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>
                    <label for="country">País</label>
                    <select id="country" name="country_id" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if($user->country_id == $country->id) selected @endif> {{ $country->name }} </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <label for="state">Estado</label>
                    <select id="state" name="state_id" class="form-control">
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}" @if($user->state_id == $state->id) selected @endif> {{ $state->name }} </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="login">Login</label>
                    <input class="form-control" type="text" name="login" placeholder="Seu login" value="{{ $user->login }}">
                </td>
                <td>
                    <!--
                        <label for="password">Senha</label>
                        <input class="form-control" type="password" placeholder="Sua senha" name="password">
                    -->
                </td>
            </tr>
            <tr>
                <td>
                    <label for="first_name">Primeiro Nome</label>
                    <input class="form-control" name="first_name" placeholder="Seu nome" type="text" value="{{ $user->first_name }}">
                </td>
                <td>
                    <label for="last_name">Sobrenome</label>
                    <input class="form-control" name="last_name" placeholder="Seu sobrenome" type="text" value="{{ $user->last_name }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nickname">Apelido</label>
                    <input class="form-control" type="text" name="nickname" placeholder="Seu apelido" value="{{ $user->nickname }}">
                </td>
                <td>
                    <label for="birthdate">Data de Nascimento</label>
                    <input class="form-control" type="text" name="birthdate" placeholder="DD/MM/AAAA" value="{{ $user->birthdate }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="exemplo@email.com" value="{{ $user->email }}">
                </td>
                <td>
                    <label for="birthdate">Sexo: </label>
                    <label class="radio-inline"><input type="radio" name="sex" value="Masculino" @if ($user->sex == 'Masculino')
                    checked @endif>Masculino</label>
                    <label class="radio-inline"><input type="radio" name="sex" value="Feminino" @if ($user->sex == 'Feminino')
                    checked @endif>Feminino</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="occupation">Cargo</label>
                    <input class="form-control" type="text" name="occupation" placeholder="Seu cargo" value="{{ $user->occupation }}">
                </td>
                <td>
                    <label for="website">Website</label>
                    <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $user->website }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="google_plus">Google +</label>
                    <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $user->google_plus }}">
                </td>
                <td>
                    <label for="twitter">Twitter</label>
                    <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $user->twitter }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="facebook">Facebook</label>
                    <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $user->facebook }}">
                </td>
                <td>
                    <label for="youtube">Youtube</label>
                    <input class="form-control" type="text" name="youtube" placeholder="https://..." value="{{ $user->youtube }}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="schooling">Escolaridade</label>
                    <select id="schooling" name="schooling_id" class="form-control">
                        @foreach ($schoolings as $schooling)
                            <option value="{{ $schooling->id }}" @if ($user->schooling_id == $schooling->id) selected @endif> 
                                {{ $schooling->desc }} 
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="bio">Conte-nos um pouco sobre você:</label>
                    <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $user->bio }}</textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-success" type="submit">Atualizar Perfil</button>
                </td>
            </tr>
        </table>
    </form>
@endsection