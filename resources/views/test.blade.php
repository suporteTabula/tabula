@extends('layouts.user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
@endsection
@section('content')
    {{dd($result)}}
    {{dd($user)}}
    {{dd($total_price)}}
@endsection