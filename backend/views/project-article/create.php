<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProjectArticle */

$this->title = 'Добавить материал для проекта';
$this->params['breadcrumbs'][] = ['label' => 'Project Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-article-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
