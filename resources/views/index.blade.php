@extends('layouts.app')

@section('title')
    @parent Главная
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
                <div class="card">
                    <div class="card-body">
                        Добро пожаловать @if(isset(Auth::user()->name))
                            {{ Auth::user()->name }}
                            @if(Auth::user()->avatar)
                               <img class="rounded-circle" src="{{ Auth::user()->avatar }}">
                            @endif
                        @endif в агрегатор новостей!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


