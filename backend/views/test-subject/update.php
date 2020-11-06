<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestSubject */

$this->title = 'Обновить тест-предмет: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
