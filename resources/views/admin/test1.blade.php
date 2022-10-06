@extends('layouts.app')

@section('title')
    @parent Тестовая 1
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2>Тестовая страница 1</h2></div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

