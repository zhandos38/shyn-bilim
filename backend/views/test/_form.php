<?php

use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $model common\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_SUCCESS,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['olympiad/update', 'id' => $model->olympiad_id], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'olympiad_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Olympiad::find()->all(), 'id', 'name'), [
        'prompt' => 'Выберите олимпиаду',
    ]) ?>

    <?= $form->field($model, 'grade_from')->textInput() ?>

    <?= $form->field($model, 'grade_to')->textInput() ?>

    <?= $form->field($model, 'level')->dropDownList(Test::getLevels()) ?>

    <?= $form->field($model, 'lang')->dropDownList(Test::getLangList()) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->andWhere(['type' => Subject::TYPE_TEACHER])->all(), 'id', 'name_ru'), [
        'prompt' => 'Выберите предмет',
    ]) ?>

    <?= $form->field($model, 'question_limit')->textInput() ?>

    <?= $form->field($model, 'time_limit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
