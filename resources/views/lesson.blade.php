@extends('layouts.user')

@section('content')
    <br><br><br><br>
    <table>
        <tr><td>{{ $lesson->name }}</td></tr>
        <tr><td>{{ $lesson->desc }}</td></tr>
    </table>
    <table>
        <tbody>
            @foreach($lesson->item_child as $child)
                <tr>
                    <td>Aula: {{ $child->name }} </td>
                    <td>Descrição: {{ $child->desc }}</td>
                </tr>                
            @endforeach
        </tbody>
    </table>
@endsection