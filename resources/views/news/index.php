<?php include "menu.php" ?>

<div class="container">
    <h4 class="mt-3">Новости</h4>
    <div class="cards-container mt-5" style="display: flex; justify-content: space-around">
        <?php foreach($categories as $item): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $item['name']?></h5>
                    <p class="card-text">Short description ...</p>
                    <a href="<?= route('category', $item['slug']);?>" class="btn btn-primary">Читать</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

