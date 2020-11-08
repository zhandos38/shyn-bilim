<?php

use common\models\TestSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $model common\models\Test */

$this->title = 'Обновить тест: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="test-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="test-option-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['test-option/create', 'id' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Список опции'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grade',
            'lang',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<fa class="fa fa-pencil"></fa>', ['test-option/update', 'id' => $model->id], ['class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<fa class="fa fa-trash"></fa>', ['test-option/delete', 'id' => $model->id], ['class' => 'btn btn-danger']);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
