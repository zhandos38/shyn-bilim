<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleMagazineSubject */

$this->title = 'Update Article Magazine Subject: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Article Magazine Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-magazine-subject-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
