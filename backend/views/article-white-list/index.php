<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WhiteListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Белый список для материала';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iin',
            'limit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
