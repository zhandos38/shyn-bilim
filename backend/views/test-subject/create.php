<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestSubject */

$this->title = 'Добавить тест-предмет';
$this->params['breadcrumbs'][] = ['label' => 'Тест предметы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-subject-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
