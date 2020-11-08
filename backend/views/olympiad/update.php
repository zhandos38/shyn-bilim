<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $model common\models\Olympiad */

$this->title = 'Обновить олимпиаду: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Олимпиады', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="olympiad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="test-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['test/create', 'id' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Список тестов'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'time_limit',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<fa class="fa fa-pencil"></fa>', ['test/update', 'id' => $model->id], ['class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<fa class="fa fa-trash"></fa>', ['test/delete', 'id' => $model->id], ['class' => 'btn btn-danger']);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
