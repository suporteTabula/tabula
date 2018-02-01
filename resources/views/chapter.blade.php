@extends('layouts.front')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $chapter->name }}
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Capítulo</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                    <tr>
                    	<td>{{ $chapter->name }}</td>
                        <td>{{ $chapter->desc }}</td>   
                    </tr>
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>Aulas/Avaliações</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <a href="#">
                                    {{ $item->name }}
                                </a>
                            </td> 
                            <td>{{ $item->desc }}</td>
                            <td>{{ $item->course_item_type->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection