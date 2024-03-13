<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/charter', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/little-geniuses/charter.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="height: 420px; padding-top: 360px; padding-left: 65px; width: 660px; text-align: center; text-transform: uppercase; line-height: 160%">
        <div id="cert-city" style="padding-top: 70px; padding-left: 130px; color: #000000; text-align: center; margin-top: 80px; width: 420px">
            <div style="padding-top: 10px">
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
        </div>
        <div id="cert-school" style="color: #000000; text-align: center; height: 100px">
            <?= $model->school->name ?>
        </div>
        <div style="margin-top: 10px">
            <?php if ($model->subject->is_not_subject): ?>
                <?= $model->subject->name_kz ?>
            <?php else: ?>
                <?= $model->subject->name_kz ?> пәні мұғалімі
            <?php endif; ?>
        </div>
        <div style="padding-top: 10px; font-size: 22px; bold; color: #000; font-weight: bold">
            <?= $model->lead_name ?>
        </div>
        <div style="padding-top: 10px">Марапатталады</div>
    </div>
    <div style="padding-top: 120px; padding-left: 80px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div>
            <div id="cert-number" style="padding-top: 0">Тіркеу №<?= $model->id ?></div>
        </div>
    </div>
</div>
