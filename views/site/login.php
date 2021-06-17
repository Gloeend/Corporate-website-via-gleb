<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section">
    <div class="section__header">
        <div class="section__title">
            <h3>Авторизация</h3>
        </div>
    </div>
    <div class="section__body">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "<div class='grid-col--4'>{input}<div style='color: lightcoral; font-size: 10px; white-space: nowrap'>{error}</div></div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>
        <div class="grid">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class'=> 'form__input', 'placeholder' =>'Логин']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'form__input', 'placeholder' => 'Пароль']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
            ])->label('Запомнить меня') ?>

            <div class="grid-row mt--20">
                <div class="grid-col--12">
                    <?= Html::submitButton('Войти', ['class' => 'ui-button', 'style' => 'border: none;', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


