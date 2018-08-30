@extends('layouts.user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
@endsection
@section('content')
    {{dd($result)}}
@endsection