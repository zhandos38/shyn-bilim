<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\View;

/* @var $this View */
/* @var $model \frontend\models\BookAssignmentForm */

$this->params['heroTitle'] = 'КАНИКУЛДА КІТАП ОҚИМЫЗ';
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="container rbt-section-gapBottom rbt-section-gapTop">
    <h1 class="mb-4">
        КАНИКУЛДА КІТАП ОҚИМЫЗ
    </h1>

    <?php $form = ActiveForm::begin() ?>

    <div class="row">
        <div class="col-md-4">

            <?= $form->field($model, 'iin') ?>

            <?= Html::submitButton('Олимпиада бастау', ['class' => 'rbt-btn btn-gradient mt--10']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>
