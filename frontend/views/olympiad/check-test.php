<?php

use frontend\models\CheckAssignmentForm;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this View */
/* @var $model CheckAssignmentForm */

$this->title = Yii::t('app', 'Продолжить олимпиаду');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вопросы и ответы'), 'url' => ['site/questions']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '#'];
?>
<h1 class="mb-4">
    <?= $this->title ?>
</h1>

<?php $form = ActiveForm::begin() ?>

<div class="row">
    <div class="col-md-4">
        <?= $form->field($model, 'iin') ?>

        <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>

