@extends('layouts.user')

@section('content')
    <br><br><br>
    <svg width=200 height=200 
         xmlns="http://www.w3.org/2000/svg" 
         xmlns:xlink="http://www.w3.org/1999/xlink">       
      <image href="{{ asset('images/hex/icon/category-2.svg') }}" />    
    </svg>
    <p><b>Usuário: {{$user->login}}</b></p>
    <p><a href="{{ route('userPanel.single') }}">Painel</a></p>
    <p><a href="{{ route('userProfile.single') }}">Perfil</a></p>
    <p><a href="{{ route('userPurchases.single') }}">Histórico</a></p>
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