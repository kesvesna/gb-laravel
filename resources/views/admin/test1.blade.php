@extends('layouts.admin')

@section('title')
    @parent Тестовая 1
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
                    <div class="card-header"><h2>Тестовая страница 1</h2></div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

