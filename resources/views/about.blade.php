@extends('layouts.app')

@section('title')
    @parent О проекте
@endsection

@section('left_menu_for_all_users')
    @include('components.left_menu_for_all_users')
@endsection

@section('right_menu')
    @include('components.right_menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="mt-3">О нас</h4>
            </div>
        </div>
    </div>
@endsection
