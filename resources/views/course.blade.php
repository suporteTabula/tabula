@extends('layouts.front')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $course->name }}
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Nome</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                    <tr>
                    	<td>{{ $course->name }}</td>
                        <td>{{ $course->desc }}</td>   
                    </tr>
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>Capítulo</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                    @foreach($chapters as $chapter)
                        <tr>
                            <td>
                                <a href="{{ route('chapter.single', ['id' => $chapter->id]) }}">
                                    {{ $chapter->name }}
                                </a>
                            </td> 
                            <td>{{ $chapter->desc }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection