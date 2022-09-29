@extends('layouts.admin')

@section('title')
    @parent Тестовая 1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <h4 class="mt-3">Тестовая страница 1</h4>
    </div>
@endsection

