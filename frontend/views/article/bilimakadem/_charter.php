<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/charter', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/bilimakadem/charter.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="height: 400px; padding-top: 520px; padding-left: 140px; width: 500px; text-align: center; color: white; font-size: 18px; text-transform: uppercase">
        <div id="cert-city" style="padding-top: 10px; text-align: center;">
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
        <div id="cert-school" style="text-align: center; line-height: 110%;">
            <?= $model->school->name ?>
        </div>
        <div style="text-transform: uppercase; padding-top: 20px;">
                <?php if ($model->subject->is_not_subject): ?>
                    <?= $model->subject->name_kz ?>
                <?php else: ?>
                    <?= $model->subject->name_kz ?> пәні мұғалімі
                <?php endif; ?>
            </div>
        <div style="padding-top: 10px; font-size: 22px;">
            <b><?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?></b>
        </div>
        <div style="padding-top: 40px">
            <b>МАРАПАТТАЛАДЫ</b>
        </div>
    </div>
    <div style="padding-top: 20px; padding-left: 660px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: 5px; color: white">
            <div id="cert-number" style="padding-top: 0">Тіркеу №<?= $model->id ?></div>
        </div>
    </div>
</div>
