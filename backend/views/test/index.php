<?php

use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Test;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

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

            'id',
            [
                'attribute' => 'subject_id',
                'value' => function(Test $model) {
                    return $model->subject->name_kz;
                },
                'filter' => ArrayHelper::map(Subject::find()->andWhere(['type' => Subject::TYPE_TEACHER])->asArray()->all(), 'id', 'name_kz')
            ],
            'grade',
            'questions_limit',
            'time_limit',
            [
                'attribute' => 'lang',
                'value' => function(Test $model) {
                    return $model->lang;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>