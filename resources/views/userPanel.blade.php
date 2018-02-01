@extends('layouts.front')

@section('content')
    <br><br><br>
    <p><b>Usuário: {{$user->login}}</b></p>
    <p><a href="{{ route('userPanel.single') }}">Painel</a></p>
    <p><a href="{{ route('userProfile.single') }}">Perfil</a></p>
    <p>Cursos</p>
    <table>
        @foreach($user->courses as $course)
            <tr>
                <td>
                    <a href="{{ route('course.single', ['id' => $course->id]) }}">
                        <div style="height:100%;width:100%">{{ $course->name }}</div>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection