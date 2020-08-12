<?php

/* @var $model \common\models\Article */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
        <div id="cert-name" style="padding-top: 400px; padding-left: 460px; width: 700px; text-align: center; font-size: 42px; font-weight: bold; color: #a58619;"><?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?></div>
        <div id="cert-school" style="padding-top: 5px; padding-left: 160px; font-size: 18px; color: #000000; height: 20px; width: 100%; text-align: center"><?= $model->school->name ?></div>
        <div id="cert-topic" style="padding-top: 30px; padding-left: 680px; font-size: 22px; color: #000000; height: 20px;"><?= $model->topic ?></div>
        <div id="cert-link" style="padding-top: 40px; padding-left: 540px; font-size: 21px; color: #3a3a3a; height: 20px; font-weight: 400"><span style="font-weight: bold">Жарияланған материалдар веб сілтемесі:</span>
            <br> <?= Yii::$app->params['staticDomain'] . '/project/' . $model->file ?></div>
        <div id="cert-date" style="padding-top: 200px; padding-left: 650px; font-size: 20px; color: #000000;">Күні: <?= date('d.m.Y') ?></div>
        <div id="cert-number" style="padding-top: 5px; padding-left: 650px; font-size: 20px; color: #000000;">Түркеу №<?= $model->id ?></div>
    </div>
</div>
