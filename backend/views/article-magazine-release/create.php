<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleMagazineRelease */

$this->title = 'Create Article Magazine Release';
$this->params['breadcrumbs'][] = ['label' => 'Article Magazine Releases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-magazine-release-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
