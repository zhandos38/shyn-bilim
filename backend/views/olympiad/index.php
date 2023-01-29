<?php

use common\models\Olympiad;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OlympiadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Олимпиады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="olympiad-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'status',
                'value' => function(Olympiad $model) {
                    return $model->getStatus();
                },
                'filter' => Olympiad::getStatuses()
            ],
            [
                'attribute' => 'is_actual',
                'value' => function($model) {
                    return $model->is_actual ? "Да" : "Нет";
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>