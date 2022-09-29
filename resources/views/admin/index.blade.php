@extends('layouts.admin')

@section('title')
    @parent Главная админки
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
<div class="container">
    <h4 class="mt-3">Страница администратора</h4>
</div>
@endsection
