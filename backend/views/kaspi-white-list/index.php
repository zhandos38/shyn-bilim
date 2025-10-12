<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WhiteListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kaspi White Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="white-list-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> [Html::a('Импорт <i class="fa fa-upload"></i>', ['import'], ['class' => 'btn btn-success btn-xs create_button'])],
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iin',
            'amount',
            'date',
            [
                'attribute' => 'is_activated',
                'value' => function(\common\models\KaspiWhiteList $model) {
                    return $model->is_activated;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
