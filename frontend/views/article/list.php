<?php
/* @var $this \yii\web\View */
/* @var $searchModel \frontend\models\ProjectArticleSearch */
/** @var Integer $articleMagazineId */
/** @var Integer $subjectId */

$this->title = Yii::t('app', Yii::t('app', 'Материалы'));
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['article/list']];
use yii\helpers\Url;
use yii\widgets\ListView;

?>
<div class="container rbt-section-gapTop rbt-section-gapBottom">
    <h1 class="site-title"><?= $this->title ?></h1>
    <div class="row">
        <div class="col-md-3">
            <div class="article-order-widget">
                <div>
                    <a class="article-order-widget__link rbt-btn btn-gradient w-100" href="<?= Url::to(['article/order', 'articleMagazineId' => $articleMagazineId, 'subjectId' => $subjectId]) ?>">
                        <?= Yii::t('app', 'Опубликовать материал') ?>
                    </a>
                </div>
                <span class="article-order-widget__text">
                    <?= Yii::t('app', 'У вас есть материал?') ?>
                </span>
            </div>
        </div>
        <div class="col-md-9">
            <?= $this->render('_search', ['model' => $searchModel, 'projectId' => Yii::$app->request->get('id')]) ?>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => '{items}',
        'options' => [
            'class' => 'row'
        ],
        'itemOptions' => [
            'class' => 'col-md-4'
        ]
    ]) ?>
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination
    ]) ?>
</div>
