@extends('layouts.admin')

@section('title')
    @parent Пользователи
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
                        <h1>Пользователи</h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ИМЯ</th>
                                    <th scope="col">ПОЧТА</th>
                                    <th scope="col">АДМИН</th>
                                    <th scope="col">СОЗДАН</th>
                                    <th scope="col">ОПЕРАЦИИ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->is_admin? 'Да':'Нет' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}">Редактировать</a>
                                        </td>
                                    </tr>
                                @empty
                                    Нет пользователей
                                @endforelse
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
