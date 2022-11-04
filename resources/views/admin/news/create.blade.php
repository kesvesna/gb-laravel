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
                        <h2>Админка создания новости</h2>
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
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                image: {
                    uploadUrl: {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowserUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                    }
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Параграф', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Заголовок 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Заголовок 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Заголовок 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Заголовок 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Заголовок 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Заголовок 6', class: 'ck-heading_heading6' },
                    ]
                }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush

