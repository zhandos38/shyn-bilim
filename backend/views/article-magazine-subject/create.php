<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleMagazineSubject */

$this->title = 'Create Article Magazine Subject';
$this->params['breadcrumbs'][] = ['label' => 'Article Magazine Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-magazine-subject-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
