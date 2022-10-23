@extends('layouts.admin')

@section('title')
    @parent Админка редакция новостей
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
                    <div class="card-header">
                        <h2>Админка {{ $new->id? 'редактирования' : 'создания' }}
                            новости {{ $new->id? 'с ID: ' . $new->id : '' }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                              action="{{ route('admin.news.store', $new->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="inputTitle" class="form-label">Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputTitle"
                                    aria-describedby="title"
                                    name="title"
                                    value="{{ $new->title }}"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Ссылка</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="link"
                                    aria-describedby="title"
                                    name="link"
                                    value="{{ $new->link }}"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Текст новости</label>
                                <textarea type="text" class="form-control" id="description"
                                          name="description">{{ $new->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="pubDate" class="form-label">Дата и время публикации:</label>
                                <input type="datetime-local" id="pubDate" class="form-control"
                                       name="pubDate" value="{{ $new->pubDate }}" step="1"
                                       min="2022-01-01T00:00:00" max="2050-01-01T00:00:00">
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin: 0px 20px 0px 0px;">Сохранить
                            </button>
                            <a href="{{ URL::previous() }}" class="btn btn-outline-success" role="button"
                               aria-pressed="true">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-ckeditor')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush

