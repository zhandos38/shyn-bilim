<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleMagazineRelease */

$this->title = 'Update Article Magazine Release: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Article Magazine Releases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-magazine-release-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
