@extends('layouts.error')

@section('title')
    @parent 404
@endsection

@section('content')
    <body>
    <div id="notfound">
        <div class="notfound-bg"></div>
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>Нет такой страницы ...</h2>
            <a href="{{ route('home') }}" class="home-btn">На главную</a>
        </div>
    </div>
@endsection



