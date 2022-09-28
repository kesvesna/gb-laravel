<?php include "menu.php" ?>
<div class="container">
    <h4 class="mt-3">Новости: <?= $categories['name'];?></h4>
    <div class="cards-container mt-4">
        <?php foreach($news as $items): ?>
            <div class="card mt-3" style="">
                <div class="card-body">
                    <h5 class="card-title"><?= $items['title'];?></h5>
                    <a href="<?= route('news.one', [$categories['slug'], $items['id']]);?>" class="btn btn-primary">Читать</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



</div>



