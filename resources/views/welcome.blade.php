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
            <table class="table table-hover">
                <thead>
                    <th>CURSOS EM DESTAQUE EM {{ $featured_category1 }}</th>
                </thead>
                <tbody>
                    @foreach($featured_courses1 as $course)
                        <tr>
                            <td>
                                <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                    {{ $course->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>CURSOS EM DESTAQUE EM {{ $featured_category2 }}</th>
                </thead>
                <tbody>
                    @foreach($featured_courses2 as $course)
                        <tr>
                            <td>
                                <a href="{{ route('course.single', ['id' => $course->id]) }}">
                                    {{ $course->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <th>BLOG</th>
                </thead>
                <tbody>
                    @foreach($featured_posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('course.single', ['id' => $post->id]) }}">
                                    {{ $post->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
