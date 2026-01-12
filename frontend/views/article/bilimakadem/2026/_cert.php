<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/bilimakadem/2026/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 800px; height: 1400px; font-family: 'Times New Roman';">
    <div id="cert-name" style="padding-top: 280px; padding-left: 230px; width: 500px; text-align: center; height: 500px">
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
        <div id="cert-school" style="font-size: 12px; color: #000000; text-align: center; line-height: 110%;">
            <?= $model->school->name ?>
            <div style="padding-top: 80px; text-transform: uppercase">
                <?php if ($model->subject->is_not_subject): ?>
                    <?= $model->subject->name_kz ?>
                <?php else: ?>
                    <?= $model->subject->name_kz ?> пәні мұғалімі
                <?php endif; ?>
            </div>
        </div>
        <div style="padding-top: 10px; font-size: 28px;">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
        <div id="cert-topic" style="padding-top: 10px; font-size: 14px; color: #663b8b; line-height: 110%; font-weight: 500;">
            <?= $model->topic ?>
        </div>
    </div>
    <div style="padding-top: 80px; padding-left: 55px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: 5px">
            <div id="cert-number" style="padding-top: 0">Тіркеу №<?= $model->id ?></div>
        </div>
    </div>
</div>
