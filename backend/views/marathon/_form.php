<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Marathon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marathon-form">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ])

    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_name')->textInput() ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_id')->textInput() ?>

    <?= $form->field($model, 'grade')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_teacher')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
