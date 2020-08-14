<?php
use common\models\Subject;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $subjects Subject */
/* @var $subject Subject */

$this->title = Yii::t('app', 'Материалы');
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['article/index']];
?>
<div style="text-align: center">
    <?php if (Yii::$app->language === 'kz'): ?>
        <h4>ҚҰРМЕТТІ ҰСТАЗ!</h4>
        Жетістік портфолиоңыз үшін <br>
        БІЗ СІЗГЕ ӘРҚАШАН ШЫҒАРМАШЫЛЫҚ ҚОЛДАУ КӨРСЕТУГЕ ДАЙЫНБЫЗ! <br>
        <b>БҰЛ БӨЛІМДЕ СІЗ:</b> <br>
        <p>
            Ашық сабақтар, сабақ жоспарларын, ҚМЖ, ОМЖ, ҰМЖ, КТЖ, сценарийлер, тәрбие сағаттарды, мұғалімдер мен оқушылардың шығармашылық жұмыстарын, ғылыми жұмыстарды, озық іс-тәжірибеңізді жариялай аласыз.
        </p>
        <p>
            Материалыңызды қосқаннан кейін бірден жариялау туралы сертификат аласыз. <br>
            Қосымша сұрағыңыз бойынша  вадсапқа <a href="https://wa.me/77750767876">https://wa.me/77750767876</a> сілтемесін басып жазуыңызға болады.
        </p>
    <?php else: ?>
        <h4>УВАЖАЕМЫЙ ПЕДАГОГ!</h4>
        Для портфолио достижений <br>
        БМЫ ВСЕГДА ГОТОВЫ ОКАЗАТЬ ВАМ ТВОРЧЕСКУЮ ПОДДЕРЖКУ! <br>
        <b>В ЭТОМ РАЗДЕЛЕ ВЫ: </b> <br>
        <p>
            Можете публиковать планы открытых уроков, уроки, ксп, ссп, дсп, ктп, сценарии, воспитательные часы, творческие работы учителей и учащихся, научные работы, передовые опыты.
        </p>
        <p>
            После добавления вашего материала вы получите сертификат об опубликовании. <br>
            По дополнительному вопросу вы можете нажать на ссылку вадсапа <a href="https://wa.me/77750767876">https://wa.me/77750767876</a>
        </p>
    <?php endif; ?>
    <div class="article-order-widget">
        <div class="article-order-widget__text">
            <?= Yii::t('app', 'У вас есть материал?') ?>
        </div>
        <a class="article-order-widget__link btn btn-success" href="<?= Url::to(['article/order']) ?>">
            <?= Yii::t('app', 'Опубликовать материал') ?>
        </a>
    </div>
</div>
<div class="row" style="padding-top: 20px">
    <?php foreach ($subjects as $subject): ?>
    <div class="col-md-3">
        <a class="subject-list__item" style="background: linear-gradient(90deg, rgba(0,0,0,0.4) 10%, rgba(0,0,0,0.4) 40%), url('<?= '/img/' . $subject->img ?>')" href="<?= Url::to(['article/list', 'id' => $subject->id]) ?>">
            <h4><?= $subject->name ?></h4>
        </a>
    </div>
    <?php endforeach; ?>
</div>