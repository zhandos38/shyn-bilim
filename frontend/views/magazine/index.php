<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Журналы');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['magazine/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="bg-gradient-6">
    <div class="container pt--60">
        <div class="section-title text-center mb--60">
            <span class="subtitle bg-secondary-opacity">Архив</span>
            <h2 class="title">Журнал</h2>
        </div>
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
    </div>
</div>
