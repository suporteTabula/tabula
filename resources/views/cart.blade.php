@extends('layouts.user')

@section('content')
    <br><br><br><br>
    Carrinho
    <table>
        @foreach($courses as $course)
        	<tr>
        		<td>{{ $course->name }}</td>
        		<td><a href="{{ route('cart.remove', ['id' => $course->cart_id]) }}">Remover</a></td>
        	</tr>
        @endforeach
    </table>
@endsection