@extends('layouts.app')

@section('title')
    @parent Админка источников
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Админка категорий</h2>
                        <a href="{{ route('admin.news.sources.create') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Добавить источник новости</a>
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
                            @forelse ($sources as $source)
                                <tr>
                                    <th>{{ $source->id }}</th>
                                    <td>{{ $source->created_at }}</td>
                                    <td>{{ $source->name }}</td>
                                    <td class="d-flex justify-content-between">
                                        {{ $source->slug }}
                                        <div>
                                            <a href="{{ route('admin.news.sources.view', [ 'id' => $source->id]) }}"><img src="../../assets/svg/view.svg" alt="Edit image" width="20" height="20" title="Просмотр" style="margin: 0px 10px 0px 0px;"></a>
                                            <a href="{{ route('admin.news.sources.create', [ 'id' => $source->id]) }}"><img src="../../assets/svg/edit.svg" alt="Edit image" style="margin: 0px 10px 0px 0px;" width="20" height="20" title="Редактировать"></a>
                                            <a href="{{ route('admin.news.sources.delete', [ 'id' => $source->id]) }}"><img src="../../assets/svg/delete.svg" alt="Edit image" width="20" height="20" title="Удалить"></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>No sources</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

