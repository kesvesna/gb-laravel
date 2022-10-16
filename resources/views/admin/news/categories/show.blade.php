@extends('layouts.admin')

@section('title')
    @parent Админка категория
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
                        <h2>Админка: категория ID {{ $category->id }} </h2>
                    </div>
                    <div class="card-body">
                        <p><b>Дата создания:</b> {{ $category->created_at }}</p>
                        <hr>
                        <p><b>Дата редактирования:</b> {{ $category->updated_at }}</p>
                        <hr>
                        <p><b>Название:</b> {{ $category->name }}</p>
                        <hr>
                        <p><b>Slug:</b> {{ $category->slug }}</p>
                        <hr>
                        <a href="{{ route('admin.news.categories.create') }}"
                           class="btn btn-outline-danger" role="button" aria-pressed="true"
                           style="margin: 0px 20px 0px 0px;">Редактировать</a>
                        <a href="{{ route('admin.news.categories.index') }}" class="btn btn-outline-success"
                           role="button" aria-pressed="true">Все категории</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

