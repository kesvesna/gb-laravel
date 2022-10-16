@extends('layouts.admin')

@section('title')
    @parent Пользователь
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
    <h2>Пользователь {{ $user->id }}</h2>
    <table class="table table-sm table-bordered table-striped">
        <tbody>
        <tr>
            <th scope="col" class="col-3">ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th scope="row">Создан</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th scope="row">Имя</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="row">Почта</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th scope="row">Админ</th>
            <td>{{ $user->is_admin? 'Да':'Нет' }}</td>
        </tr>
        </tbody>
    </table>
        <a href="{{ route('admin.users.index') }}" class="btn btn-success">Назад</a>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Редактировать</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
