<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectArticle */

$this->title = 'Обновить материал проекта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Project Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-article-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
