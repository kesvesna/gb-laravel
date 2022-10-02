@extends('layouts.app')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        Добро пожаловать в агрегатор новостей!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


