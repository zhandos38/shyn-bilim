<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WhiteList */

$this->title = 'Редактировать белый список: ' . $model->iin;
$this->params['breadcrumbs'][] = ['label' => 'White Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iin, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="white-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
