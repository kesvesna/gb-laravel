@extends('layouts.app')

@section('title')
    @parent Одной новости
@endsection

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Новости: {{ $categories->name }}</div>
                <div class="card-body">
                    @if ($news)
                        @if(!$news->is_private)
                            <h5>{{ $news->title }}</h5>
                            <p>{{ $news->description }}</p>
                        @else
                            <p>Зарегистрируйтесь для просмотра всех новостей</p>
                        @endif
                    @else
                        <p>Нет такой новости</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

