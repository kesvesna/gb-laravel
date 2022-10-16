@extends('layouts.admin')

@section('title')
    @parent Админка категорий
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
                    <div class="card-header d-flex justify-content-between">
                        <h2>Админка категорий</h2>
                        <a href="{{ route('admin.news.categories.create') }}" class="btn btn-outline-success"
                           role="button" aria-pressed="true">Добавить категорию</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Название</th>
                                <th scope="col">Slug</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <th>{{ $category->id }}</th>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="d-flex justify-content-between">
                                        {{ $category->slug }}
                                        <div>
                                            <a href="{{ route('admin.news.categories.show', $category->id) }}"><img
                                                    src="../../assets/svg/view.svg" alt="Edit image" width="20"
                                                    height="20" title="Просмотр" style="margin: 0px 10px 0px 0px;"></a>
                                            <a href="{{ route('admin.news.categories.create') }}"><img
                                                    src="../../assets/svg/edit.svg" alt="Edit image"
                                                    style="margin: 0px 10px 0px 0px;" width="20" height="20"
                                                    title="Редактировать"></a>
                                            <a href="{{ route('admin.news.categories.destroy', $category->id) }}"><img
                                                    src="../../assets/svg/delete.svg" alt="Edit image" width="20"
                                                    height="20" title="Удалить"></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>No categories</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

