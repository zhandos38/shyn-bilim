<?php

use common\models\Article;
use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Материалы';
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
            'iin',
            'topic',
            'file',
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
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function(Article $model) {
                    return date('d-m-Y H:i', $model->created_at);
                },
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

    <?php LteBox::end() ?>

</div>
