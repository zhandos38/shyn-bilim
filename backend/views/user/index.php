<?php

use common\models\User;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php
        LteBox::begin([
            'type' => LteConst::TYPE_INFO,
            'isSolid' => true,
            'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
            'tooltip' => 'this tooltip description',
            'title' => 'Пользователи'
        ])
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'surname',
            'patronymic',
            [
                'attribute' => 'phone',
                'value' => function(User $model) {
                    return '<a target="_blank" href="https://wa.me/7' . $model->phone . '">' . $model->phone . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'role',
                'value' => function(User $model) {
                    return $model->getRoleLabel();
                },
            ],
            [
                'attribute' => 'status',
                'value' => function(User $model) {
                    return $model->getStatusLabel();
                }
            ],
            'subscribe_until',
            [
                'attribute' => 'created_at',
                'value' => function(User $model) {
                    return date('m.d.Y H:i', $model->created_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end()?>

</div>