<?php include "menu.php" ?>

<div class="container">
    <h4 class="mt-3">Новости</h4>
    <?php foreach($categories as $item): ?>
        <a href="<?= route('category', $item['slug']);?>"><?= $item['name']?></a>
        <hr>
    <?php endforeach; ?>
</div>

