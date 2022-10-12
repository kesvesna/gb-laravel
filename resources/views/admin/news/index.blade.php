@extends('layouts.app')

@section('title')
    @parent Админка новостей
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
                        <h2>Админка новостей</h2>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Добавить новость</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                               <th scope="col">ID</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">Краткое описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($news as $new)
                                <tr>
                                    <th>{{ $new->id }}</th>
                                    <td>{{ $new->created_at }}</td>
                                    <td>{{ $new->category->name }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td class="d-flex justify-content-between">
                                        {{ $new->short_description }}
                                        <div>
                                            <a href="{{ route('admin.news.view', [ 'id' => $new->id]) }}"><img src="../../assets/svg/view.svg" alt="Edit image" width="20" height="20" title="Просмотр" style="margin: 0px 10px 0px 0px;"></a>
                                            <a href="{{ route('admin.news.create', [ 'id' => $new->id]) }}"><img src="../../assets/svg/edit.svg" alt="Edit image" style="margin: 0px 10px 0px 0px;" width="20" height="20" title="Редактировать"></a>
{{--                                            <a href="{{ route('admin.news.delete', [ 'id' => $new->id]) }}"><img src="../../assets/svg/delete.svg" alt="Edit image" width="20" height="20" title="Удалить"></a>--}}
                                            <a href="javascript:;" rel="{{ $new->id }}" class="delete"><img src="../../assets/svg/delete.svg" alt="Edit image" width="20" height="20" title="Удалить"></a>
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
        document.addEventListener("DOMContentLoaded", function(){
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k){
                e.addEventListener("click", function(){
                    const id = e.getAttribute("rel");
                    if(confirm(`Удалить запись с ID: ${id}`))
                    {
                        send(`/admin/news/delete/${id}`).then(()=>{
                            location.reload();
                        });
                    }
                });
            })
        });

        async function send(url)
        {
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
