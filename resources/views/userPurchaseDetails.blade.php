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
    <table>
        @foreach($purchases as $purchase)
            <tr>
                <td>
                    Hash: {{ $purchase->hash }} //
                    Valor: {{ $purchase->price }} // 
                    Curso: <a href="{{ route('course.single', ['id' => $purchase->course_id]) }}">{{ $purchase->course_name }}</a> //
                    Data: {{ $purchase->created_at }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection