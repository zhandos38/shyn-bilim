<?php

use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suffix_label_kz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]) ?>

    <?php if ($model->img): ?>
        <img src="<?= $model->getImage() ?>" alt="product-image" width="200px">
    <?php endif; ?>

    <?= $form->field($model, 'type')->dropDownList(Subject::getTypes(), ['prompt' => 'Выберите тип']) ?>

    <?= $form->field($model, 'kind')->dropDownList(Subject::getKinds(), ['prompt' => 'Выберите вид']) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'grades')->textInput() ?>

    <?= $form->field($model, 'is_not_subject')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
