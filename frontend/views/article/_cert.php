<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 800px; font-family: 'Times New Roman';">
    <div id="cert-name" style="padding-top: 390px; padding-left: 190px; width: 540px; text-align: center; height: 210px">
        <div id="cert-city" style="padding-top: 0; font-size: 16px; color: #000000; text-align: center;">
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
        <div id="cert-school" style="font-size: 14px; color: #000000; text-align: center; line-height: 110%;">
            <?= $model->school->name ?>
            <div style="padding-top: 40px;">
            <?php if ($model->subject->is_not_subject): ?>
                <?= $model->subject->name_kz ?>
            <?php else: ?>
                <?= $model->subject->name_kz ?> пәні мұғалімі
            <?php endif; ?>
        </div>
        </div>
        <div style="padding-top: 10px; font-size: 28px; color: #D79236;">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
            <div id="cert-topic" style="padding-top: 12px; font-size: 16px; color: #000000; line-height: 110%; font-weight: 500;">
                 <?= $model->topic ?>
            </div>
        </div>
    </div>
    <div style="padding-top: 10px; padding-left: 55px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: 18px; padding-left: 63px">
            <div id="cert-number" style="padding-top: 0"><?= $model->id ?></div>
        </div>
    </div>
</div>
