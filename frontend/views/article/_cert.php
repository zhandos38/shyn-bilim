<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article-cert2.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px;">
    <div id="cert-name" style="width: 560px; padding-top: 385px; padding-left: 490px; text-align: center">
        <span style="font-size: 24px; font-weight: bold; color: #7c5822">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </span>
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
        <div id="cert-school" style="font-size: 14px; color: #000000; height: 50px; text-align: center; line-height: 110%;">
            <?= $model->school->name ?>
        </div>
    </div>
    <div id="cert-topic" style="padding-top: 10px; padding-left: 470px; font-size: 18px; color: #7c5822; line-height: 110%; width: 600px; height: 40px; text-align: center">
         <?= $model->topic ?>
    </div>
    <div style="padding-top: 0; padding-left: 22px; padding-bottom: 80px; font-size: 14px; font-weight: bold; color: #FFFFFF">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div id="cert-date" style="padding-top: 10px">Күні: <?= date('d.m.Y') ?></div>
        <div id="cert-number" style="padding-top: -5px">Тіркеу №<?= $model->id ?></div>
    </div>
</div>
