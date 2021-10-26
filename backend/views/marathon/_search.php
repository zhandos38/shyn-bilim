<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MarathonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marathon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'iin') ?>

    <?php // echo $form->field($model, 'school_id') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'phone_parent') ?>

    <?php // echo $form->field($model, 'phone_teacher') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
