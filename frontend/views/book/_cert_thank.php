<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\User */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/cert-thank.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="padding-top: 560px; padding-left: 120px; width: 540px; text-align: center">
        <div style="padding-left: 70px; width: 400px; font-size: 16px;">
            <div id="cert-city" style="padding-top: 0; color: #000000; height: 10px;">
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
            <div id="cert-school" style="color: #000000; height: 60px; line-height: 110%;">
                <?= $model->school->name ?>
                <div style="text-transform: lowercase;">
                    <?= $model->teacher_title ?>
                </div>
            </div>
        </div>
        <div style="text-transform: uppercase; padding-top: 10px; height: 80px; font-size: 22px; font-weight: bold">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
    </div>
    <div style="padding-top: 190px; padding-left: 20px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div id="cert-number" style="padding-left: 20px; padding-top: 20px; font-size: 12px">Тіркеу №<?= $model->id ?></div>
    </div>
</div>
