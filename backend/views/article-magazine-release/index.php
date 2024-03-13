<?php

use common\models\ArticleMagazineRelease;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleMagazineReleaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Magazine Releases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-magazine-release-index">

    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => 'Журналы материалов'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'article_magazine_id',
                'value' => function(ArticleMagazineRelease $model) {
                    return $model->articleMagazine->name;
                }
            ],
            'name',
            'img',
            'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php LteBox::end() ?>


</div>
