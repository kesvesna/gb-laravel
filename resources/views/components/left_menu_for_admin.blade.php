
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.index')?'active':'' }}"
           href="{{ route('admin.index') }}">Админка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.news.index')?'active':'' }}" href="{{ route('admin.news.index') }}">Новости</a>
    </li>
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link {{ request()->routeIs('admin.news.categories.index')?'active':'' }}" href="{{ route('admin.news.categories.index') }}">Категории</a>--}}
{{--    </li>--}}
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.news.sources.index')?'active':'' }}" href="{{ route('admin.news.sources.index') }}">Источники</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.users.index')?'active':'' }}" href="{{ route('admin.users.index') }}">Пользователи</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.parser')?'active':'' }}" href="{{ route('admin.parser') }}">Парсер</a>
    </li>







