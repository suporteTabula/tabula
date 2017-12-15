@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $category->desc }}
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Cursos</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Curso 1
                        </td>
                        <td>
                            Curso 2
                        </td>
                        <td>
                            Curso 3
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection