@extends('layouts.app')

@section('title')
    @parent Вход
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="main-content" style="display: flex; justify-content: center">
    <form class="col-6 mt-5">
        <h3>Вход</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>
@endsection

