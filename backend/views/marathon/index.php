<?php

use common\models\City;
use common\models\Marathon;
use common\models\Region;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarathonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marathons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marathon-index">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Марафон'
    ])

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'patronymic',
            'parent_name',
            'iin',
            [
                'attribute' => 'region_id',
                'value' => function(Marathon $model) {
                    return $model->school !== null ? $model->school->city->region->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'city_id',
                'value' => function(Marathon $model) {
                    return $model->school !== null ? $model->school->city->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'school_id',
                'value' => function(Marathon $model) {
                    return $model->school->name;
                }
            ],
            'grade',
            [
                'attribute' => 'phone',
                'value' => function(Marathon $model) {
                    return '<a target="_blank" href="https://wa.me/7' . $model->phone . '">' . $model->phone . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'phone_parent',
                'value' => function(Marathon $model) {
                    return '<a target="_blank" href="https://wa.me/7' . $model->phone_parent . '">' . $model->phone_parent . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'phone_teacher',
                'value' => function(Marathon $model) {
                    return '<a target="_blank" href="https://wa.me/7' . $model->phone_teacher . '">' . $model->phone_teacher . '</a>';
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'created_at',
                'value' => function(Marathon $model) {
                    return date('d.m.Y H:i', $model->created_at);
                },
                'format' => 'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
