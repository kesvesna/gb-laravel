@extends('layouts.main')

@section('title')
    @parent Одной новости
@endsection

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<div class="container">
    <h4 class="mt-3">Новости: {{ $categories['name'] }}</h4>
    @if ($news)
        @if (!$news['isPrivate'])
            <h5>{{ $news['title'] }}</h5>
            <p>{{ $news['text'] }}</p>
        @else
            <p>Зарегистрируйтесь для просмотра всех новостей</p>
        @endif
    @else
        <p>Нет такой новости</p>
    @endif
</div>
@endsection

