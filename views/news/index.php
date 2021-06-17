<?php
/* @var $this yii\web\View */
/** @var $obNews \app\models\News */
$this->title = 'Новости';

?>
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
