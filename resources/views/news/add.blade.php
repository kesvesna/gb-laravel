@extends('layouts.main')

@section('title')
    @parent Добавление новости
@endsection

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<div class="main-content" style="display: flex; justify-content: center">
    <form class="col-6 mt-5">
        <h3>Добавление новости</h3>
        <div class="dropdown mb-3 mt-4">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Категория новости
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Политика</a></li>
                <li><a class="dropdown-item" href="#">Наука и технологии</a></li>
                <li><a class="dropdown-item" href="#">Спорт</a></li>
            </ul>
        </div>
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="inputTitle" aria-describedby="title">
        </div>
        <div class="mb-3">
            <label for="inputShortDescription" class="form-label">Краткое описание</label>
            <input type="text" class="form-control" id="inputShortDescription">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Текст новости</label>
            <textarea type="text" class="form-control" id="inputDescription"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection

