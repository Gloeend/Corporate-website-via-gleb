<?php

/* @var $this yii\web\View */
/* @var $obNews \app\models\News */

$this->title = 'Главная';
?>
<div class="content-outer">
    <div class="mb--45">
        <div class="introduction mb--45">
            <h1 class="introduction__header">Привет! <br> Попробуй наш конструктор:</h1>
            <a href="/construct" class="ui-button ui-button--yellow">Конструктор</a>
        </div>
    </div>
</div>
<div class="section">
    <div class="section__header">
        <div class="section__title">
            <h3>Новости
                <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->myRole() === 'admin' || Yii::$app->user->identity->myRole() === 'moderator')): ?>
                    <a href="/news/create" class="section__link">Добавить</a>
                <?php endif; ?>
            </h3>
        </div>
    </div>
    <div class="section__body">
        <div class="grid">
            <div class="grid-row">
                <?php foreach ($obNews as $obItem): ?>
                    <div class="grid-col--3">
                        <a href="/news/view?id=<?=$obItem->id?>" class="preview">
                            <div class="preview-picture-container">
                                <div class="preview-picture__item"
                                     style="background-image: url(<?= Yii::getAlias('@web') . '/' . $obItem->preview ?>)"></div>
                            </div>
                            <div class="preview__title">
                                <?= $obItem->title ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
