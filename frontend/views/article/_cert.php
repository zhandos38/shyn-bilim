<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 800px; font-family: 'Times New Roman';">
    <div id="cert-name" class="bordered" style="padding-top: 300px; padding-left: 80px; width: 600px; text-align: center">
        <div id="cert-city" style="padding-top: 0; font-size: 14px; color: #000000; height: 10px; text-align: center;">
            <?php
            if ($model->school !== null) {
                if ($model->school->city_id === 1 || $model->school->city_id === 2 || $model->school->city_id === 3) {
                    echo $model->school->city->name;
                } else {
                    echo $model->school->city->region->name . ', ' . $model->school->city->name;
                }
            }
            ?>
        </div>
        <div id="cert-school" style="font-size: 14px; color: #000000; height: 70px; text-align: center; line-height: 110%;">
            <?= $model->school->name ?>
            <div style="text-transform: uppercase; font-weight: bold; padding-top: 10px;">
            <?= $model->subject->name_kz ?> пәні мұғалімі
        </div>
        </div>
        <div style="padding-top: 10px; height: 100px; font-size: 28px; font-weight: bold; color: #000;">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
            <div id="cert-topic" style="padding-top: 12px; font-size: 20px; color: #000000; line-height: 110%; font-weight: 500;">
                 <?= $model->topic ?>
            </div>
        </div>
    </div>
    <div style="padding-top: 140px; padding-left: 22px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: -50px; padding-left: 100px">
            <div id="cert-date" style="padding-top: 10px">Күні: <?= date('d.m.Y', $model->created_at) ?></div>
            <div id="cert-number" style="padding-top: 0">Тіркеу №<?= $model->id ?></div>
        </div>
    </div>
</div>
