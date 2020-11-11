<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WhiteList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="white-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
