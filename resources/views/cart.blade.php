@extends('layouts.user')

@section('content')
    <br><br><br><br>
    Carrinho
    <table>
        @if(count($courses) > 0)
            @foreach($courses as $course)
            	<tr>
            		<td>{{ $course->name }}</td>
                    <td>{{ $course->price }}</td>
            		<td><a href="{{ route('cart.remove', ['id' => $course->cart_id]) }}">Remover</a></td>
            	</tr>
            @endforeach
            <tr><td>Total: {{ $total_price }}</td></tr>
            <tr><td><a href="{{ route('cart.checkout') }}">Checkout</a></td></tr>
        @else
            <tr><td>Não existem items no carrinho!</td></tr>
            <tr><td>Acesse nosso <a href="{{ route('search.single', ['id' => -1]) }}">catalogo</a></td></tr>
        @endif
    </table>
@endsection