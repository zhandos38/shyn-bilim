<?php

use common\models\User;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'surname')->textInput() ?>

        <?= $form->field($model, 'patronymic')->textInput() ?>

        <?= $form->field($model, 'iin')->textInput() ?>

        <?= $form->field($model, 'phone')->textInput() ?>

        <?= $form->field($model, 'role')->dropDownList(User::getRoles(), ['prompt' => 'Указать роль']) ?>

        <?= $form->field($model, 'status')->dropDownList(User::getStatuses(), ['prompt' => 'Указать статус']) ?>

        <?= $form->field($model, 'article_count') ?>

        <?= $form->field($model, 'subscribe_until') ?>

        <div class="form-group mt-2">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

</div>
