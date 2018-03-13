@extends('layouts.user')

@section('content')
    <br><br><br><br>
    <table>
        <tr><td>{{ $course->name }}</td></tr>
        <tr><td>{{ $course->desc }}</td></tr>
        <tr><td>{{ $course->price }}</td></tr>
    </table>
    <table>
        <tbody>
            @auth
                @if($hasCourse)
                    <tr><td>INICIAR CURSO</td></tr>
                @else 
                    <tr><td><a href="{{ route('cart.insert', ['id' => $course->id]) }}"> Colocar no carrinho </a></td></tr>
                @endif
            @endauth
            @foreach($chapters as $chapter)
                <tr>
                    <td>Capitulo: {{ $chapter->name }} </td>
                    <td>Descrição: {{ $chapter->desc }}</td>
                </tr>
                @foreach ($chapter->course_items as $item)
                    @if (is_null($item->course_items_parent))
                        <tr><td><a href="{{ route('course.lesson', ['id' => $item->id]) }}">{{ $item->name }}</a></td></tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection