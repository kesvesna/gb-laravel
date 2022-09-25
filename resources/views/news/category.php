<?php include "menu.php" ?>
<h2>Новости: <?= $categories['name'];?></h2>
<?php foreach($news as $items):?>
    <a href="<?= route('one_new', [$categories['slug'], $items['id']]);?>"><?= $items['title'];?></a><hr>
<?php endforeach;?>
