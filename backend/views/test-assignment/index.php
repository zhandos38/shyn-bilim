<?php

use common\models\School;
use common\models\TestAssignment;
use common\models\Test;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-assignment-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'test_id',
                'value' => function(TestAssignment $model) {
                    return $model->test->subject->name_kz . '-' . $model->lang . '-' . $model->test->subject->getTypeLabel();
                },
                'filter' => ArrayHelper::map(Test::find()->asArray()->all(), 'id', function ($model) {
                    $subject = \common\models\Subject::findOne(['id' => $model['subject_id']]);
                    return $subject->name_kz . '-' . $model['lang'] . '-' . $subject->getTypeLabel();
                })
            ],
            'name',
            'surname',
            'patronymic',
            'iin',
            [
                'attribute' => 'region_id',
                'value' => function(TestAssignment $model) {
                    return $model->school->city->region->name;
                },
                'filter' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'city_id',
                'value' => function(TestAssignment $model) {
                    return $model->school->city->name;
                },
                'filter' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'school_id',
                'value' => function(TestAssignment $model) {
                    return $model->school->name;
                },
                'filter' => ArrayHelper::map(School::find()->asArray()->all(), 'id', 'name')
            ],
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
                    return date('d-m-Y H:i', $model->created_at + 2160);
                }
            ],
            //'finished_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
