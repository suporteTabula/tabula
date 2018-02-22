@extends('layouts.user')

@section('content')
    <br><br><br><br>
    {{ $category->desc }}
    <table>
        @if ($category->courses->count() > 0)
            @foreach($courses as $course)
                <tr><td><a href="{{ route('course.single', ['id' => $course->id]) }}">{{ $course->name }}</a></td></tr>   
            @endforeach
        @else 
            <tr><td>Não existem cursos</td></tr> 
        @endif
    </table>
@endsection