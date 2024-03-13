<?php

use common\models\ArticleMagazine;
use common\models\ArticleMagazineSubject;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticleMagazineSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Article Magazine Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-magazine-subject-index">

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
                'value' => function(ArticleMagazineSubject $model) {
                    return $model->articleMagazine->name;
                },
                'filter' => ArrayHelper::map(ArticleMagazine::find()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'subject_id',
                'value' => function(ArticleMagazineSubject $model) {
                    return $model->subject->name_kz;
                },
                'filter' => ArrayHelper::map(Subject::find()->all(), 'id', 'name_kz')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

    <?php LteBox::end() ?>


</div>
