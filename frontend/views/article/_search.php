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
    ]); ?>

    <div class="row">
        <div class="col-md-10">
            <?= $form->field($model, 'topic')->textInput(['placeholder' => 'Тақырып', 'style' => 'height: 60px'])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'rbt-btn w-100']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
