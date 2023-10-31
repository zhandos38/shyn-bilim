<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'book_category_id',
                'value' => function(\common\models\Book $model) {
                    return $model->bookCategory ? $model->bookCategory->name : "-";
                }
            ],
            'file',
            'img',
            'age_range',
            //'book_category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
