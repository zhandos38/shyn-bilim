<?php

use common\models\Article;
use common\models\Subject;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-article-index">
    <?php LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title,
    ]) ?>

    <?php
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'surname',
            'patronymic',
            'iin',
            [
                'attribute' => 'phone',
                'value' => function(Article $model) {
                    return '<a target="_blank" href="https://wa.me/7' . $model->phone . '">' . $model->phone . '</a>';
                },
                'format' => 'raw'
            ],
            'topic',
            'file',
            [
                'attribute' => 'article_magazine_id',
                'value' => function(Article $model) {
                    return $model->getArticleMagazine()->one() ? $model->getArticleMagazine()->one()->name : '-';
                }
            ],
            [
                'attribute' => 'status',
                'value' => function(Article $model) {
                    return $model->getStatus();
                },
                'filter' => Article::getStatuses(),
            ],
            [
                'attribute' => 'subject_id',
                'value' => function(Article $model) {
                    return $model->subject !== null ? $model->subject->name : 'Не указано';
                },
                'filter' => ArrayHelper::map(Subject::find()->where(['type' => Subject::TYPE_ARTICLE])->asArray()->all(), 'id', 'name_ru')
            ],
            [
                'attribute' => 'created_at',
                'value' => function(Article $model) {
                    return date('d-m-Y H:i', $model->created_at);
                },
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ];
//        echo ExportMenu::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => $gridColumns,
//        ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'options' => [
            'class' => 'table-responsive'
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
