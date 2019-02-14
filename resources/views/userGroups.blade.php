@extends('layouts.user')

@section('content')
    <br><br><br><br>
    Grupos de usuário
    <table>
        @if(count($userGroups) > 0)
            @foreach($userGroups as $userGroup)
                <tr>
                    <td>{{ $userGroup->company->name }}</td>
                    <td><a href="{{ route('userGroupIndex.single', ['group' => $userGroup->desc]) }}">{{ $userGroup->company->name }}</a></td>
                </tr>
            @endforeach
        @else
            <tr><td>Você não possui Empresas!</td></tr>
            <tr><td>Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a></td></tr>
        @endif
    </table>
@endsection