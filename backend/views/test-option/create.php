<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestOption */

$this->title = 'Добавить вариант теста';
$this->params['breadcrumbs'][] = ['label' => 'Test Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-option-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
