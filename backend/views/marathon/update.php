<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Marathon */

$this->title = 'Update Marathon: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Marathons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marathon-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
