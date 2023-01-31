<?php

use common\models\School;
use common\models\Subject;
use common\models\TestAssignment;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Test;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Участники олимпиады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-assignment-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?php
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'olympiad_id',
                'value' => function(TestAssignment $model) {
                    return $model->olympiad !== null ? $model->olympiad->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(\common\models\Olympiad::find()->asArray()->all(), 'id', 'name')
            ],
            'name',
            'surname',
            'patronymic',
            'iin',
            [
                'attribute' => 'region_id',
                'value' => function(TestAssignment $model) {
                    return $model->school !== null && $model->school->city !== null && $model->school->city->region !== null ? $model->school->city->region->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'city_id',
                'value' => function(TestAssignment $model) {
                    return $model->school !== null && $model->school->city !== null ? $model->school->city->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'school_id',
                'value' => function(TestAssignment $model) {
                    return $model->school !== null ? $model->school->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(School::find()->asArray()->all(), 'id', 'name'),
                'format' => 'raw'
            ],
            'teacher_name',
            'grade',
            [
                'attribute' => 'phone',
                'value' => function(TestAssignment $model) {
                    return '<a target="_blank" href="https://wa.me/7' . $model->phone . '">' . $model->phone . '</a>';
                },
                'format' => 'raw'
            ],
            'point',
            [
                'attribute' => 'status',
                'value' => function(TestAssignment $model) {
                    return $model->getStatus();
                },
                'filter' => TestAssignment::getStatuses()
            ],
            [
                'attribute' => 'created_at',
                'value' => function(TestAssignment $model) {
                    return date('d-m-Y H:i', $model->created_at + 21600);
                }
            ],
            //'finished_at',

            ['class' => 'yii\grid\ActionColumn'],
        ];

        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'clearBuffers' => true, //optional
        ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive'
        ],
        'columns' => $gridColumns,
    ]); ?>

    <?php LteBox::end() ?>

</div>
