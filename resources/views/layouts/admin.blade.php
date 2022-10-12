<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title')Страница@show</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@yield('menu')
@yield('content')
</body>
</html>
