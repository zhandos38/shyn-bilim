<?php
use common\models\Subject;

/* @var $this \yii\web\View*/

$this->title = Yii::t('app', 'Олимпиады');
?>
<h1><?= $this->title ?></h1>
<?php /** @var String $type */
if ($type == Subject::TYPE_TEACHER): ?>
    <p>
        <?= Yii::t('app', 'Вы можете ознакомиться с правилами проведения олимпиады <a href="/file/Ereje-Pedagoc.doc"><b>подробнее</b></a>') ?>
    </p>
<?php else: ?>
<?php endif; ?>
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