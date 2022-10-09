@extends('layouts.app')

@section('title')
    @parent Админка новость
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Админка: новость ID {{ $new->id }} </h2>
                    </div>
                    <div class="card-body">
                        <p><b>Дата создания:</b> {{ $new->created_at }}</p>
                        <hr>
                        <p><b>Дата редактирования:</b> {{ $new->updated_at }}</p>
                        <hr>
                        <p><b>Источник:</b> {{ $new->source->name }}</p>
                        <hr>
                        <p><b>Категория:</b> {{ $new->category->name }}</p>
                        <hr>
                        <p><b>Заголовок:</b> {{ $new->title }}</p>
                        <hr>
                        <p><b>Краткое описание:</b> {{ $new->short_description }}</p>
                        <hr>
                        <p><b>Полное описание:</b> {{ $new->description }}</p>
                        <hr>
                        <p><b>Приватная:</b> {{ $new->is_private? 'Да' : 'Нет'}}</p>
                        <hr>
                        <p><b>Картинка:</b><a href="{{ $new->image? $new->image : '#' }}"> {{ $new->image? $new->image : 'Отсутствует'}}</a></p>
                        <hr>
                        <a href="{{ route('admin.news.create', ['id' => $new->id]) }}" class="btn btn-outline-danger" role="button" aria-pressed="true" style="margin: 0px 20px 0px 0px;">Редактировать</a>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Все новости</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

