<?php
use common\models\Subject;

/* @var $this \yii\web\View*/

$this->title = Yii::t('app', $type ? 'Для преподавателей' : 'Для учеников');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Олимпиады'), 'url' => ['olympiad/index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['#']];
?>
<div class="olympiad-info">
    <?php /** @var String $type */
    if ($type == Subject::TYPE_TEACHER): ?>
        <img class="olympiad-img" src="/img/ped-olympiad.jpg" alt="">
        <h1><?= Yii::t('app', 'Уважаемые педагоги') ?></h1>
        <p>
            <?= Yii::t('app', 'Приглашаем Вас принять участие в Республиканской предметной олимпиаде <b>«ЕҢ БІЛІМДІ ПЕДАГОГ - 2020»!</b>') ?>
        </p>
        <p>
            <?= Yii::t('app', 'Победители будут награждены НАГРУДНЫМ ЗНАКОМ и ДИПЛОМОМ') ?>
        </p>
        <p>
           <?= Yii::t('app', 'Все участники получат <b>СЕРТИФИКАТ</b>') ?>
        </p>
        <p>
            <?= Yii::t('app', 'Полностью ознакомьтесь с положением олимпиады') ?>, <a href="/file/<?= Yii::$app->language === 'kz' ? 'ped-rule-kz.docx' : 'ped-rule-ru.doc' ?>"><b><?= Yii::t('app', 'подробнее') ?></b></a>
        </p>
    <?php else: ?>
        <p>
            <?= Yii::t('app', 'Вы можете ознакомиться с правилами проведения олимпиады <a href="/file/Altyn-Urpak.doc"><b>подробнее</b></a>') ?>
        </p>
    <?php endif; ?>
</div>
<?= \yii\widgets\ListView::widget([
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