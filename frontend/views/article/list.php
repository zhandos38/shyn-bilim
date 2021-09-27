<?php
/* @var $this \yii\web\View */
/* @var $searchModel \frontend\models\ProjectArticleSearch */

$this->title = Yii::t('app', Yii::t('app', 'Материалы'));
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['article/list']];
use yii\helpers\Url;
?>
<h1 class="site-title"><?= $this->title ?></h1>
<div class="article-order-widget">
    <span class="article-order-widget__text">
        <?= Yii::t('app', 'У вас есть материал?') ?>
    </span>
    <a class="article-order-widget__link btn btn-success" href="<?= Url::to(['article/order', 'id' => $id]) ?>">
        <?= Yii::t('app', 'Опубликовать материал') ?>
    </a>
</div>
<?= $this->render('_search', ['model' => $searchModel, 'projectId' => Yii::$app->request->get('id')]) ?>

<?= \yii\widgets\ListView::widget([
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
