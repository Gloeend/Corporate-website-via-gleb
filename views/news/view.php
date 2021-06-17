<?php
/* @var $this yii\web\View */
/* @var $obNews \app\models\News */

$this->title = $obNews->title;
?>

<div class="section">
    <div class="section__header">
        <div class="breadcrumb">
            <a href="/news" class="breadcrumb__item">Новости</a>
            <div class="breadcrumb__item"><?= $obNews->title ?></div>
        </div>
        <div class="section__title section__title--view">
            <h3><?= $obNews->title ?>
                <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->myRole() === 'admin' || Yii::$app->user->identity->myRole() === 'moderator')): ?>
                    <a href="/news/update?id=<?= $obNews->id ?>" class="section__link">Редактировать</a>
                <?php endif; ?>
            </h3>
        </div>
    </div>
    <div class="section__body">
        <div class="view">
            <div class="view__picture"
                 style="background-image: url('<?= Yii::getAlias('@web').'/'.$obNews->preview ?>')"
            ></div>
            <p class="view__desc">
                <?= $obNews->desc ?>
            </p>
        </div>
    </div>
</div>
