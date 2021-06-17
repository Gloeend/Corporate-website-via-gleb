<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
    <a href="/" class="logotype"></a>
    <div class="header-navigation">
        <a href="/" class="header-navigation__item">
            Главная
        </a>
        <a href="/news" class="header-navigation__item">
            Новости
        </a>
        <?php if (Yii::$app->user->isGuest): ?>
            <a href="/site/register" class="header-navigation__item">Регистрация</a>
            <a href="/site/login" class="header-navigation__item">Авторизация</a>
        <?php elseif (Yii::$app->user->identity->myRole() === 'admin'): ?>
            <a href="/construct" class="header-navigation__item">Конструктор</a>
            <a href="/admin" class="header-navigation__item">Панель администратора</a>
            <a href="/site/logout" class="header-navigation__item">Выйти</a>
        <?php elseif (Yii::$app->user->identity->myRole() === 'moderator'): ?>
            <a href="/construct" class="header-navigation__item">Конструктор</a>
            <a href="/site/logout" class="header-navigation__item">Выйти</a>
        <?php else: ?>
            <a href="/construct" class="header-navigation__item">Конструктор</a>
            <a href="/site/logout" class="header-navigation__item">Выйти</a>
        <?php endif; ?>
    </div>
</header>

<div class="wrap">
    <div class="content">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="footer-content">
        <a href="/" class="logotype logotype--white"></a>
        <a href="https://vk.com/graveall" class="footer__social-link">Мой вк</a>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
