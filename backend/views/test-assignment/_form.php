<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TestAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_id')->dropDownList(ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'grade')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'point')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\TestAssignment::getStatuses()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
