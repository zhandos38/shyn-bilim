<?php

use common\models\ProjectArticle;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы Проектов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-article-index">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools'=> Html::a('Добавить <i class="fa fa-plus-circle"></i>', ['create'], ['class' => 'btn btn-success btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' => $this->title
    ])

    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'surname',
            'patronymic',
            'topic',
            'file',
            [
                'attribute' => 'project_id',
                'value' => function(ProjectArticle $model) {
                    return $model->project !== null ? $model->project->name : 'Не указано';
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function(ProjectArticle $model) {
                    return date('d-m-Y H:i', $model->created_at);
                },
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
