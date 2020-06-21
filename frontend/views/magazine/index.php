<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Журналы');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['magazine/index']];
?>
<h1><?= $this->title ?></h1>
<div class="magazine-list">
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => '{items}{pager}',
        'options' => [
            'class' => 'row'
        ],
        'itemOptions' => [
            'class' => 'col-md-3'
        ]
    ]) ?>
</div>
