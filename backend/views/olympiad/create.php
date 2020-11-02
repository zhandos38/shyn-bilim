<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Olympiad */

$this->title = 'Создать олимпиаду';
$this->params['breadcrumbs'][] = ['label' => 'Олимпиады', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="olympiad-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
