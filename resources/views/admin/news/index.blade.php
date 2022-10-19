@extends('layouts.admin')

@section('title')
    @parent Админка новостей
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
                        <h2>Админка новостей</h2>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-outline-success" role="button"
                           aria-pressed="true">Добавить новость</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Дата публикации</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Ссылка</th>
                                <th scope="col">GUID</th>
                                <th scope="col">Описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($news as $new)
                                <tr>
                                    <th>{{ $new->id }}</th>
                                    <th>{{$new->pubDate}}</th>
                                    <td>{{ $new->title }}</td>
                                    <td>{{ $new->link }}</td>
                                    <td>{{ $new->guid }}</td>
                                    <td class="d-flex justify-content-between">
                                        {{ $new->description }}
                                        <div>
                                            <a href="{{ route('admin.news.show', $new->id) }}"><img
                                                    src="../../assets/svg/view.svg" alt="Edit image" width="20"
                                                    height="20" title="Просмотр" style="margin: 0px 10px 0px 0px;"></a>
                                            <a href="{{ route('admin.news.edit', $new->id) }}"><img
                                                    src="../../assets/svg/edit.svg" alt="Edit image"
                                                    style="margin: 0px 10px 0px 0px;" width="20" height="20"
                                                    title="Редактировать"></a>
                                            <a href="javascript:;" rel="{{ $new->id }}" class="delete"><img
                                                    src="../../assets/svg/delete.svg" alt="Edit image" width="20"
                                                    height="20" title="Удалить"></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>No news</p>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function () {
                    const id = e.getAttribute("rel");
                    if (confirm(`Удалить запись с ID: ${id}`)) {
                        send(`/admin/news/destroy/${id}`).then(() => {
                            location.reload();
                        });
                    }
                });
            })
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
