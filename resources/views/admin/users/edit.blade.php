@extends('layouts.admin')

@section('title')
    @parent Редактирование пользователя
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
                    <div class="card-body">
    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">ПОЛЬЗОВАТЕЛЬ</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">ПОЧТА</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
        </div>
        <div class="form-group mb-3">
            <label for="is_admin">Права админа</label>
            <select name="is_admin" id="is_admin" class="form-control">
                <option value="1">Да</option>
                <option value="0">Нет</option>
            </select>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-success mr-3">Назад</a>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
