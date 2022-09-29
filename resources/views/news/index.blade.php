@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('news.menu')
@endsection

@section('content')
<div class="container">
    <h4 class="mt-3">Новости</h4>
    <div class="cards-container mt-5" style="display: flex; justify-content: space-around">
        @forelse($categories as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['name'] }}</h5>
                    <p class="card-text">Short description ...</p>
                    <a href="{{ route('category', $item['slug']) }}" class="btn btn-primary">Читать</a>
                </div>
            </div>
        @empty
            <p>Нет новостей</p>
        @endforelse
    </div>
</div>
@endsection
