<?php

/* @var $model \common\models\Article */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
        <div id="cert-name" style="padding-top: 400px; padding-left: 320px; width: 1000px; text-align: center; font-size: 32px; font-weight: bold; color: #ab7f36;"><?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?></div>
        <div id="cert-school" style="padding-top: 5px; padding-left: 320px; font-size: 18px; color: #000000; height: 20px; width: 1000px; text-align: center"><?= $model->school->name ?></div>
        <div id="cert-topic" style="padding-top: 42px; padding-left: 680px; font-size: 22px; color: #000000; height: 20px;"><?= $model->topic ?></div>
        <div id="cert-link" style="padding-top: 40px; padding-left: 540px; font-size: 21px; color: #3a3a3a; height: 20px; font-weight: 400"><span style="font-weight: bold">Жарияланған материалдар веб сілтемесі:</span></div>
        <div style="text-align: center; font-size: 16px; font-weight: bold; padding-left: 380px; width: 860px">
            <?= Yii::$app->params['staticDomain'] . '/project/' . $model->file ?>
        </div>
        <div id="cert-date" style="padding-top: 160px; padding-left: 644px; font-size: 20px; color: #000000;">Күні: <?= date('d.m.Y') ?></div>
        <div id="cert-number" style="padding-top: 5px; padding-left: 644px; font-size: 20px; color: #000000;">Тіркеу №<?= $model->id ?></div>
    </div>
</div>
