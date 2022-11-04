@extends('layouts.app')

@section('title')
    @parent Категории новостей
@endsection

@section('left_menu_for_all_users')
    @include('components.left_menu_for_all_users')
@endsection

@section('right_menu')
    @include('components.right_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="mt-3">Новости: {{ $categories->name }}</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @forelse($news as $items)
                    <div class="card mt-2">
                        <h5 class="card-header">{{ $items->title }}</h5>
                        <div class="card-body">
                            <a href="{{ route('news.one', [$categories->slug, $items->id]) }}" class="btn btn-primary">Читать</a>
                        </div>
                    </div>
                @empty
                    <p>Нет новостей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection


