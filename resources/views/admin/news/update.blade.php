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
                            <div class="form-group mb-3">
                                <label for="newsCategory">Категории новостей</label>
                                <select name="category_id" id="newsCategory" class="form-control">
                                    @forelse($categories as $category)
                                        <option @if($category->id == old('categories')) selected @endif
                                        value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @empty
                                        <option value="0">Нет категорий</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="newsSource">Категории источников новостей</label>
                                <select name="source_id" id="newsSource" class="form-control">
                                    @forelse($sources as $source)
                                        <option @if($source->id == old('source')) selected @endif
                                        value="{{ $source->id }}">{{ $source->name }}
                                        </option>
                                    @empty
                                        <option value="0">Нет источников</option>
                                    @endforelse
                                </select>
                            </div>
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
                                <label for="inputShortDescription" class="form-label">Краткое описание новости</label>
                                <textarea type="text" class="form-control" id="inputShortDescription"
                                          name="short_description">{{ $new->short_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputDescription" class="form-label">Текст новости</label>
                                <textarea type="text" class="form-control" id="inputDescription"
                                          name="description">{{ $new->description }}</textarea>
                            </div>
                            <div class="form-check mb-3">
                                <input @if(old('isPrivate') == '1') checked @endif id="newsPrivate" name="is_private"
                                       type="checkbox" value="1" class="form-check-input">
                                <label for="newsPrivate">Приватная новость</label>
                            </div>
                            @if($new->image)
                                <div class="mb-3">
                                    <label for="newsExistFile">Существующий файл</label>
                                    <input class="form-control" type="text" readonly placeholder="{{ $new->image }}"
                                           id="newsExistFile">
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="image" class="form-label">Выберите файл ...</label>
                                <input class="form-control" type="file" id="image" name="image">
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

