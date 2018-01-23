@extends('layouts.front')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Usuário: {{$user->login}}</b>
            <div align="center">
                <a class="btn btn-success" href="{{ route('userPanel.single') }}">Painel</a>
                <a class="btn btn-success" href="{{ route('userProfile.single') }}">Perfil</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group row">
                <div class="col-xs-4">
                    <table class="table table-hover">
                        <thead>
                            <th>Cursos</th>
                        </thead>
                        <tbody>
                            @foreach($user->courses as $course)
                                <tr>
                                    <td>
                                        <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                            <div style="height:100%;width:100%">{{ $course->name }}</div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection