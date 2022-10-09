@extends('layouts.app')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12">
    <h4 class="mt-3">Новости</h4>
    <div class="cards-container mt-5" style="display: flex; justify-content: space-around">
        @forelse($categories as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <a href="{{ route('categories', $item->slug) }}" class="btn btn-primary">Читать</a>
                </div>
            </div>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
    </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h5>Экспорт новостей</h5></div>
                <div class="card-body">
                    <form method="GET" action="{{ route('export') }}">
                        @csrf
                        <div class="form-group">
                            <label for="newsCategory">Категории новостей</label>
                            <select name="category_id" id="newsCategory" class="form-control">
                                    <option value="0">Все категории</option>
                                @forelse($categories as $category)
                                    <option @if($category->id == old('categories')) selected @endif
                                    value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @empty
                                    <option value="0">Нет категорий</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="exportType">Тип файла</label>
                            <select name="export_file_type" id="exportType" class="form-control">
                                <option value="xlsx">xlsx</option>
                                <option value="pdf">pdf</option>
                                <option value="json">json</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Выгрузить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
