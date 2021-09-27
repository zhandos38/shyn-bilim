<?php
/* @var $this \yii\web\View */
/* @var $searchModel \frontend\models\ProjectArticleSearch */

$this->title = Yii::t('app', Yii::t('app', 'Мои материалы'));

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\bootstrap4\LinkPager;
?>
<div>
    <h2><?= $this->title ?></h2>
    <p>
        <?= Yii::t('app', 'Лимит бесплатных публикации') ?>: <?= Yii::$app->user->identity->article_count ?>
    </p>
    <div class="article-order-widget">
        <a class="article-order-widget__link btn btn-success" href="<?= Url::to(['article/order']) ?>">
            <?= Yii::t('app', 'Опубликовать материал') ?>
        </a>
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
    <?= LinkPager::widget([
        'pagination' => $dataProvider->pagination
    ]) ?>
</div>
