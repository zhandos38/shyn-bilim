<?php

use common\models\TestSubject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TestOption */

$this->title = 'Обновить вариант теста: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Test Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-option-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="test-subject">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['test-subject/create', 'id' => $model->id], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Список предметов'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'subject_id',
                'value' => function(TestSubject $model) {
                    return $model->subject->name_kz;
                },
                'filter' => false
            ],

            'questions_limit',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<fa class="fa fa-pencil"></fa>', ['test-subject/update', 'id' => $model->id], ['class' => 'btn btn-info']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<fa class="fa fa-trash"></fa>', ['test-subject/delete', 'id' => $model->id], ['class' => 'btn btn-danger']);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
