@extends('layouts.admin')

@section('title')
    @parent Добавление новости
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h5>Добавление новости</h5></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.create') }}">
                            @csrf
                            <div class="form-group">
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
                            <div class="mb-3">
                                <label for="inputTitle" class="form-label">Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputTitle"
                                    aria-describedby="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                >
                            </div>
                            <div class="mb-3">
                                <label for="inputDescription" class="form-label">Текст новости</label>
                                <textarea type="text" class="form-control" id="inputDescription"
                                          name="description">{{ old('text') }}</textarea>
                            </div>
                            <div class="form-check mb-2">
                                <input @if(old('isPrivate') === '1') checked @endif id="newsPrivate" name="is_private"
                                       type="checkbox" value="1" class="form-check-input">
                                <label for="newsPrivate">Приватная новость</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

