<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MagazineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Журналы материалов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-index">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Журналы материалов'
    ])

    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'img',
            'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
