<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; font-family: 'Times New Roman';">
    <div id="cert-qrcode" style="height: 60px; padding-top: 40px; padding-right: -30px; width: 160px; font-size: 22px; float: right">
        <img src="<?= $qrCode->writeDataUri() ?>">
    </div>
    <div id="cert-name" style="padding-top: 310px; padding-left: 310px; text-align: center; font-size: 28px; font-weight: bold; color: #ab7f36;">
        <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
    </div>
    <div id="cert-school" style="padding-top: 5px; padding-left: 340px; font-size: 16px; color: #000000; height: 45px; width: 600px; text-align: center">
        <?= $model->school->name ?>
    </div>
    <div id="cert-topic" style="padding-top: 12px; padding-left: 560px; font-size: 18px; color: #000000; height: 55px; width: 460px;">
        <?= $model->topic ?>
    </div>
    <div style="padding-top: 192px; padding-left: 525px; padding-bottom: 78px; font-size: 18px; color: #000000;">
        <div id="cert-date">Күні: <?= date('d.m.Y') ?></div>
        <div id="cert-number" style="padding-top: 5px;">Тіркеу №<?= $model->id ?></div>
    </div>
</div>
