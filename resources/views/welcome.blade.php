@extends('layouts.front')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Macrotemas</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <a href="{{ route('category.single', ['id' => $category->id]) }}">
                                    <div style="height:100%;width:100%">
                                        {{ $category->desc }} ({{ $category->courses->count() }})
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
