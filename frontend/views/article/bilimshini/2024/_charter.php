<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/charter', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/bilimshini/2024/charter.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="height: 200px; padding-top: 540px; padding-left: 110px; width: 600px; text-align: center; font-size: 20px">
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
        <div id="cert-school" style="color: #000000; text-align: center; line-height: 110%;">
            <?= $model->school->name ?>
        </div>
        <div style="text-transform: uppercase;">
            <?= $model->subject->name_kz ?>
        </div>
        <div style="padding-top: 10px; bold; color: #000;">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
    </div>
    <div style="padding-top: 100px; padding-left: 60px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: 19px; padding-left: 53px">
            <div id="cert-number" style="padding-top: 0"><?= $model->id ?></div>
        </div>
    </div>
</div>
