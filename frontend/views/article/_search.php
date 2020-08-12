<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['list', 'id' => $projectId],
        'method' => 'get',
        'options' => [
            'style' => 'display:flex;justify-content: space-between;'
        ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Имя')])->label(false) ?>

    <?= $form->field($model, 'surname')->textInput(['placeholder' => Yii::t('app', 'Фамилия')])->label(false) ?>

    <?= $form->field($model, 'patronymic')->textInput(['placeholder' => Yii::t('app', 'Отчество')])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Очистить'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
