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
        <tr><td>Total: {{ $total_price }}</td></tr>
    </table>
@endsection