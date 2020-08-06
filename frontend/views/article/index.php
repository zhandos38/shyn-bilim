<?php
use common\models\Subject;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $subjects Subject */
/* @var $subject Subject */

$this->title = Yii::t('app', 'Материалы');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['article/index']];
?>
<h1><?= $this->title ?></h1>
<div class="article-order-widget">
    <div class="article-order-widget__text">
        <?= Yii::t('app', 'У вас есть материал?') ?>
    </div>
    <a class="article-order-widget__link btn btn-success" href="<?= Url::to(['article/order']) ?>">
        <?= Yii::t('app', 'Опубликовать материал') ?>
    </a>
</div>
<div class="row" style="padding-top: 20px">
    <div class="col-md-3">
        <?php foreach ($subjects as $subject): ?>
            <a class="subject-list__item" style="background: linear-gradient(90deg, rgba(0,0,0,0.4) 10%, rgba(0,0,0,0.4) 40%), url('<?= '/img/' . $subject->img ?>')" href="<?= Url::to(['article/list', 'id' => $subject->id]) ?>">
                <h4><?= $subject->name ?></h4>
            </a>
        <?php endforeach; ?>
    </div>
</div>