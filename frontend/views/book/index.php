<?php
/* @var $this \yii\web\View */

$this->title = 'Балалар кітапханасы';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['book/index']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'БІЛІМ ШЫҢЫ - ҒЫЛЫМ СЫРЫ';
?>
<div class="bg-gradient-6">
    <div class="container pt--60">
        <div class="section-title text-center mb--60">
            <span class="subtitle bg-secondary-opacity">Кітапхана</span>
            <h2 class="title">Балалар кітапханасы</h2>
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
