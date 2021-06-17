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
            <div class="construct__label">Итоговая стоимость:</div>
            <div class="construct__price"><?= $obSoftwareService->service->price ?> рублей</div>
            <div class="construct-actions">
                <a href="/construct/store?software_service=<?= $obSoftwareService->id ?>" class="construct-actions__item construct-actions__item--yellow">Отправить заявку</a>
                <a href="/construct" class="construct-actions__item">Заново</a>
            </div>
        </div>
    </div>
</div>
