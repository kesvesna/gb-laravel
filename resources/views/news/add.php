<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавление новости</title>
    <link type="text/css" rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
</head>
<body>
<?php include_once "menu.php"; ?>
<div class="main-content" style="display: flex; justify-content: center">
    <form class="col-6 mt-5">
        <h3>Добавление новости</h3>
        <div class="dropdown mb-3 mt-4">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Категория новости
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Политика</a></li>
                <li><a class="dropdown-item" href="#">Наука и технологии</a></li>
                <li><a class="dropdown-item" href="#">Спорт</a></li>
            </ul>
        </div>
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Заголовок</label>
            <input type="text" class="form-control" id="inputTitle" aria-describedby="title">
        </div>
        <div class="mb-3">
            <label for="inputShortDescription" class="form-label">Краткое описание</label>
            <input type="text" class="form-control" id="inputShortDescription">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Текст новости</label>
            <textarea type="text" class="form-control" id="inputDescription"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

