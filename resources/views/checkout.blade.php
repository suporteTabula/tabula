@extends('layouts.user')

@section('content')
    <br><br><br><br>
    Detalhes da compra
    <table>
        @if(count($courses) > 0)
            @foreach($courses as $course)
            	<tr>
            		<td>{{ $course->name }}</td>
                    <td>{{ $course->desc }}</td>
            	</tr>
            @endforeach
            <tr><td><a href="{{ route('transaction.success') }}">Finalizar a compra</a></td></tr>
        @else
            <tr><td>Não existem items para finalizar a compra!</td></tr>
            <tr><td>Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a></td></tr>
        @endif
    </table>
@endsection