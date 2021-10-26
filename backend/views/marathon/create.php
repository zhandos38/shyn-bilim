<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Marathon */

$this->title = 'Create Marathon';
$this->params['breadcrumbs'][] = ['label' => 'Marathons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marathon-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
