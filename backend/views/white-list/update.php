<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WhiteList */

$this->title = 'Обновить Белый список: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Белый список', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="white-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
