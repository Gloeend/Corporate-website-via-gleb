<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\User */
/* @var $fn app\models\FirstName */
/* @var $ln app\models\LastName */

/* @var $mn app\models\MiddleName */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section">
    <div class="section__header">
        <div class="section__title">
            <h3>Регистрация</h3>
        </div>
    </div>
    <div class="section__body">
        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "<div class='grid-col--4'>{input} <div style='color: lightcoral; font-size: 10px; white-space: nowrap'>{error}</div></div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
            'options' => [
                'class' => 'form',
            ],
        ]);
        ?>
        <div class="grid">
            <div class="grid-row">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form__input', 'placeholder' => 'Логин']) ?>
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form__input', 'placeholder' => 'Пароль']) ?>
                <?= $form->field($model, 'age')->input('number', ['min' => 18, 'max'=>99,'class' => 'form__input', 'placeholder' => 'Возраст']) ?>
            </div>

            <div class="grid-row">
                <?= $form->field($fn, 'title')->textInput(['class' => 'form__input', 'placeholder' => 'Имя']) ?>
                <?= $form->field($ln, 'title')->textInput(['class' => 'form__input', 'placeholder' => 'Фамилия']) ?>
                <?= $form->field($mn, 'title')->textInput(['class' => 'form__input', 'placeholder' => 'Отчество']) ?>
            </div>


            <div class="grid-row mt--20">
                <div class="grid-col--12">
                    <?= Html::submitButton('Войти', ['class' => 'ui-button', 'style' => 'border: none;', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


