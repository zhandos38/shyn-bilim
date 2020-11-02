<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Olympiad */

$this->title = 'Обновить олимпиаду: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Олимпиады', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="olympiad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
