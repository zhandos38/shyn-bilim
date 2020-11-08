<?php
use common\models\Subject;
use yii\widgets\ListView;

/* @var $this \yii\web\View*/
/** @var \common\models\Olympiad $olympiad */

$this->title = $olympiad->getType();

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Олимпиады'), 'url' => ['olympiad/index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['#']];
?>
<div class="olympiad-info">
    <p>
        <?= Yii::t('app', 'Вы можете ознакомиться с правилами проведения олимпиады <a href="{file}"><b>подробнее</b></a>', ['file' => $olympiad->getFile()]) ?>
    </p>
</div>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}{pager}',
    'itemView' => '_item',
    'options' => [
        'class' => 'row'
    ],
    'itemOptions' => [
        'class' => 'col-md-3'
    ]
]) ?>