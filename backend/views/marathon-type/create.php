<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MarathonType */

$this->title = 'Create Marathon Type';
$this->params['breadcrumbs'][] = ['label' => 'Marathon Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marathon-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
