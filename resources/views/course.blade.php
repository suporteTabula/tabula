@extends('layouts.front')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $course->name }}
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>{{ $course->name }}</th>
                </thead>
                <tbody>
                    <tr>
                    	<td>{{ $course->desc }}</td>   
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection