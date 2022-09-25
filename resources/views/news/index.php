<?php include "menu.php" ?>
<h2>Новости</h2>

<?php foreach($categories as $item): ?>
    <a href="<?= route('category', $item['slug']);?>"><?= $item['name']?></a>
    <hr>
<?php endforeach; ?>
