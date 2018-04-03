@extends('layouts.user')

@section('content')
    <br><br><br><br>
    Grupos de usuário
    <table>
        @if(count($userGroups) > 0)
            @foreach($userGroups as $userGroup)
                <tr>
                    <td>{{ $userGroup->desc }}</td>
                    <td><a href="{{ route('userGroupIndex.single', ['group' => $userGroup->desc]) }}">{{ $userGroup->desc }}</a></td>
                </tr>
            @endforeach
        @else
            <tr><td>Você não possúi grupos!</td></tr>
            <tr><td>Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a></td></tr>
        @endif
    </table>
@endsection