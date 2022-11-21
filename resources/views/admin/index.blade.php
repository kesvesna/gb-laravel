@extends('layouts.app')

@section('title')
    @parent Главная админки
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Админка</h2></div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
