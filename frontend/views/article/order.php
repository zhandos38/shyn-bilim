<?php

use common\models\Subject;
use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="order-form">
    <h1><?= $this->title ?></h1>
    <p>Чтобы опубликовать материал, необходимо заполнить форму и произвести оплату на сумму 2500 тенге</p>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'subject_id')->dropDownList(\yii\helpers\ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Выбрать предмет')]) ?>

    <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Оплатить и опубликовать'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

</div>
