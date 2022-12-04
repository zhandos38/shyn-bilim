<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WhiteList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="white-list-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Subject::find()->andWhere(['type' => \common\models\Subject::TYPE_STUDENT])->all(), 'id', 'name_ru'), [
        'prompt' => 'Выберите предмет',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
