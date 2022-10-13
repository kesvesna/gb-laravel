@extends('layouts.app')

@section('title')
    @parent Админка редакция категорий
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Админка {{ $category->id? 'редактирования' : 'создания' }} категории {{ $category->id? 'с ID: ' . $category->id : '' }}</h2>
                    </div>
                    <div class="card-body">
                        @include('inc.message')
                        <form method="POST" action="{{ route('admin.news.categories.store', ['id' => $category->id]) }}">
                            @csrf
                            @include('inc.message')
                            <div class="mb-3">
                                <label for="inputTitle" class="form-label">Название</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputTitle"
                                    aria-describedby="title"
                                    name="name"
                                    value="{{ $category->name }}"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="inputSlug" class="form-label">Slug</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputSlug"
                                    aria-describedby="slug"
                                    name="slug"
                                    value="{{ $category->slug }}"
                                >
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin: 0px 20px 0px 0px;">Сохранить</button>
                            <a href="{{ URL::previous() }}" class="btn btn-outline-success" role="button" aria-pressed="true">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

