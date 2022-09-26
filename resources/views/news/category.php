<?php include "menu.php" ?>
<div class="container">
    <h4 class="mt-3">Новости: <?= $categories['name'];?></h4>
    <?php foreach($news as $items):?>
        <a href="<?= route('one_new', [$categories['slug'], $items['id']]);?>"><?= $items['title'];?></a><hr>
    <?php endforeach;?>
</div>



