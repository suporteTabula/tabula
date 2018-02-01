@extends('layouts.front')

@section('content')
    <br><br><br><br>
    <table>
        <tr><td>{{ $course->name }}</td></tr>
        <tr><td>{{ $course->desc }}</td></tr>
    </table>
    <table>
        <tbody>
            @foreach($chapters as $chapter)
                <tr><td>Nome: <a href="{{ route('chapter.single', ['id' => $chapter->id]) }}">{{ $chapter->name }}</a></td></tr>
                <tr><td>Descrição: {{ $chapter->desc }}</td></tr>
            @endforeach
        </tbody>
    </table>
@endsection