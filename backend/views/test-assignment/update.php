<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestAssignment */

$this->title = 'Update Test Assignment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Test Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-assignment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
