<?php

use common\models\Olympiad;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Olympiad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="olympiad-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'is_actual')->checkbox() ?>

    <?= $form->field($model, 'fileTempKz')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= $form->field($model, 'fileTempRu')->widget(FileInput::classname(), [
        'options' => ['accept' => 'document/*'],
    ]) ?>

    <?= $form->field($model, 'imageFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <?= $form->field($model, 'type')->dropDownList(Olympiad::getTypes(), ['prompt' => 'Укажите тип']) ?>

    <?= $form->field($model, 'status')->dropDownList(Olympiad::getStatuses(), ['prompt' => 'Укажите статус']) ?>

    <?= $form->field($model, 'order') ?>

    <?= $form->field($model, 'folder_name')->textInput() ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'is_landscape_diploma_orientation')->checkbox() ?>

            <?= $form->field($model, 'is_landscape_cert_orientation')->checkbox() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'is_landscape_cert_thank_leader_orientation')->checkbox() ?>

            <?= $form->field($model, 'is_landscape_cert_thank_parent_orientation')->checkbox() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
