<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $model app\models\UploadImage */
/* @var $form ActiveForm */
?>
<div class="section">
    <div class="section__header">
        <div class="section__title"><h3>Изменить новость: <?= $model->title ?></h3></div>
    </div>
    <div class="section__body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="grid">
            <div class="grid-col-12">
                <?= $form->field($model, 'title')->textInput(['class' => 'form__input', 'placeholder' => 'Заголовок'])->label(false) ?>
            </div>
            <div class="grid-col-12 mt--20">
                <?= $form->field($model, 'desc')->textarea(['rows' => '10', 'cols' =>'60', 'class'=> 'form__input', 'placeholder' => 'Детальный текст', 'style' => 'resize: none; height:auto;width:auto'])
                    ->label(false) ?>
            </div>
            <div class="grid-col-12 mt--20">
                <?= $form->field($upload, 'image')->fileInput()->label(false) ?>
            </div>
        </div>

        <div class="grid-row mt--20">
            <div class="grid-col--12">
                <?= Html::submitButton('Сохранить', ['class' => 'ui-button', 'style' => 'border: none;', 'name' => 'save-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</div><!-- news-create -->
