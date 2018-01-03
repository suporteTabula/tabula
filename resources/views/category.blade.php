@extends('layouts.front')

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
                        @if ($category->courses->count() > 0)
                            @foreach($courses as $course)
                                <td><a href="{{ route('course.single', ['id' => $course->id]) }}">{{ $course->name }}</a></td>   
                            @endforeach
                        @else 
                            <td colspan="4" class="text-center">Não existem cursos</td>  
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection