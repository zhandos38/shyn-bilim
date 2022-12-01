<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\grid\GridView;
use common\models\Test;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тесты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

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

            [
                'attribute' => 'olympiad_id',
                'value' => function(\common\models\Test $test) {
                    return $test->olympiad->name;
                }
            ],
            'grade_from',
            'grade_to',
            [
                'attribute' => 'subject_id',
                'value' => function(\common\models\Test $model) {
                    return $model->subject ? $model->subject->name : '-';
                }
            ],
            [
                'attribute' => 'level',
                'value' => function(Test $model) {
                    return $model->getLevelLabel();
                }
            ],
            'lang',
            'question_limit',
            'time_limit',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}'
            ],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
