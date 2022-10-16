@extends('layouts.app')

@section('title', 'Vue example')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div id="app">
        <example-component></example-component>
    </div>
@endsection
