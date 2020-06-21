<?php
/* @var $this \yii\web\View*/

$this->title = Yii::t('app', 'Олимпиады');
?>
<h1><?= $this->title ?></h1>
<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}{pager}',
    'itemView' => '_item',
    'options' => [
        'class' => 'row'
    ],
    'itemOptions' => [
        'class' => 'col-md-4'
    ]
]) ?>