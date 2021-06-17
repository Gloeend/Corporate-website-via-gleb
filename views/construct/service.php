<?php
/* @var $this yii\web\View */

$this->title = 'Конструктор';
?>
<div class="section">
    <div class="section__header">
        <div class="section__title">
            <h3>Конструктор</h3>
        </div>
    </div>
    <div class="section__body">
        <div class="construct">
            <div class="construct__label">Выберите услугу</div>
            <div class="construct-products">
                <?php foreach ($obSoftwareService as $obItem): ?>
                    <a href="/construct/sum?software_service=<?=$obItem->id?>" class="construct-products__item"><?= $obItem->service->title ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
