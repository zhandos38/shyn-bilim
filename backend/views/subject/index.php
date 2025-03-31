<?php

use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index">

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

            'id',
            'name_kz',
            'name_ru',
            'suffix_label_kz',
            [
                'attribute' => 'img',
                'value' => function(Subject $model) {
                    return $model->img ? "<img style='height: 80px' src='". $model->getImage() ."' />" : '-';
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'type',
                'value' => function(Subject $model) {
                    return $model->getTypeLabel();
                },
                'filter' => Subject::getTypes()
            ],
            [
                'attribute' => 'kind',
                'value' => function(Subject $model) {
                    return $model->getKindLabel();
                },
                'filter' => Subject::getKinds()
            ],
            'order',
            'grades',
            'is_not_subject',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>

</div>
