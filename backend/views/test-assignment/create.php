<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestAssignment */

$this->title = 'Добавить участника';
$this->params['breadcrumbs'][] = ['label' => 'Test Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-assignment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
