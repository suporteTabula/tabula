@extends('layouts.user')

@section('content')
    <br><br><br><br>
    Obrigado por comprar!
    <table>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->name }}</td>
                <td>{{ $course->desc }}</td>
            </tr>
        @endforeach
    </table>
@endsection