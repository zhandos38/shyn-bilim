<?php

use common\models\Olympiad;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WhiteList */
/* @var $form yii\widgets\ActiveForm */

$model->olympiad_id = 24    ;
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

    <?= $form->field($model, 'olympiad_id')->dropDownList(ArrayHelper::map(Olympiad::find()->orderBy(['id' => SORT_DESC])->all(), 'id', 'name'), [
        'prompt' => 'Выберите предмет',
    ]) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(ArrayHelper::map(Subject::find()->andWhere(['type' => Subject::TYPE_STUDENT])->all(), 'id', 'name_ru'), [
        'prompt' => 'Выберите предмет',
    ]) ?>

    <?= $form->field($model, 'iin_list')->textarea([ 'rows' => '30' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
