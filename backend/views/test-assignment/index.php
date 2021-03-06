<?php

use common\models\School;
use common\models\TestAssignment;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\Test;

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'table-responsive'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'test_id',
                'value' => function(TestAssignment $model) {
                    return $model->testOption ? $model->testOption->test->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(Test::find()->asArray()->all(), 'id','name')
            ],
            'name',
            'surname',
            'patronymic',
            'iin',
            [
                'attribute' => 'region_id',
                'value' => function(TestAssignment $model) {
                    return $model->school !== null ? $model->school->city->region->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'city_id',
                'value' => function(TestAssignment $model) {
                    return $model->school !== null ? $model->school->city->name : 'Не указано';
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
            'leader_name',
            'grade',
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
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
