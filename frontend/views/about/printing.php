<?php

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Полиграфия');

$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['about/printing']];
?>
<h1><?= Yii::t('app', 'Полиграфия') ?></h1>
<div class="row">
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/1.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Офсетная печать') ?></p>
    </div>
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/2.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Термопереплет, пур-биндер') ?></p>
    </div>
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/3.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Журналы') ?></p>
    </div>
</div>
<div class="row">
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/4.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Пригласительные, Бланки, <br> Брошюры, Буклеты') ?></p>
    </div>
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/5.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Медали, Таблички') ?></p>
    </div>
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/6.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Календари') ?></p>
    </div>
</div>
<div class="row">
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/7.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Книги') ?></p>
    </div>
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/8.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Статуэтка') ?></p>
    </div>
    <div class="printing__img-wrapper col-md-4">
        <img class="printing__img" src="/img/9.jpg" alt="image">
        <p class="printing__title"><?= Yii::t('app', 'Баннер, плакат') ?></p>
    </div>
</div>
