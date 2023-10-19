<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BookCategory */

$this->title = 'Create Book Category';
$this->params['breadcrumbs'][] = ['label' => 'Book Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
