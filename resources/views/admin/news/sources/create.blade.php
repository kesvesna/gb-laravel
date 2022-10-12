@extends('layouts.app')

@section('title')
    @parent Админка редакция источников
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
                        <h2>Админка {{ $source->id? 'редактирования' : 'создания' }} источника новости {{ $source->id? 'с ID: ' . $source->id : '' }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.news.sources.store', ['id' => $source->id]) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="inputTitle" class="form-label">Название источника</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputTitle"
                                    aria-describedby="title"
                                    name="name"
                                    value="{{ $source->name }}"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="inputSlug" class="form-label">Slug источника</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputSlug"
                                    aria-describedby="slug"
                                    name="slug"
                                    value="{{ $source->slug }}"
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
