<?php
use Da\QrCode\QrCode;
use yii\helpers\Url;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/education-nation/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="padding-top: 340px; padding-left: 60px; width: 660px; text-align: center; height: 340px; line-height: 110%; font-size: 18px; ">
        <div id="cert-city" style="padding-top: 0; color: #000000; text-align: center;">
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
        <div id="cert-school" style="color: #000000; text-align: center">
            <?= $model->school->name ?>
        </div>
        <div style="padding-top: 50px">
            <?php if ($model->subject->is_not_subject): ?>
                <?= $model->subject->name_kz ?>
            <?php else: ?>
                <?= $model->subject->name_kz ?> пәні мұғалімі
            <?php endif; ?>
        </div>
        <div style="padding-top: 10px; font-size: 28px; color: #D79236">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
        <div style="color: #D79236; padding-top: 140px; font-size: 18px">
            <?= $model->topic ?>
        </div>
    </div>
    <div style="padding-top: 260px; padding-left: 55px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: 5px; text-transform: uppercase">
            <div id="cert-number" style="padding-top: 2px; color: white">Тіркеу №<?= $model->id ?></div>
        </div>
    </div>
</div>
