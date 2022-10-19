@extends('layouts.admin')

@section('title')
    @parent Админка новость
@endsection

@section('left_menu_for_admin')
    @include('components.left_menu_for_admin')
@endsection

@section('right_menu')
    @include('components.right_menu')
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
                        <p><b>Заголовок:</b> {{ $new->title }}</p>
                        <hr>
                        <p><b>Ссылка:</b> {{ $new->link }}</p>
                        <hr>
                        <p><b>GUID:</b> {{ $new->guid }}</p>
                        <hr>
                        <p><b>Описание:</b> {{ $new->description }}</p>
                        <hr>
                        <p><b>Дата публикации:</b> {{ $new->pubDate }}</p>
                        <hr>
                        <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-outline-danger"
                           role="button" aria-pressed="true" style="margin: 0px 20px 0px 0px;">Редактировать</a>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-success" role="button"
                           aria-pressed="true">Все новости</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

