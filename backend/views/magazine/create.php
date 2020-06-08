<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Magazine */

$this->title = 'Добавить журнал';
$this->params['breadcrumbs'][] = ['label' => 'Журналы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
