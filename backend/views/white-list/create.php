<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WhiteList */

$this->title = 'Добавить в Белый список';
$this->params['breadcrumbs'][] = ['label' => 'White Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-list-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
