<?php
use Da\QrCode\QrCode;
use yii\helpers\Url;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/little-geniuses/cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 800px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="padding-top: 480px; padding-left: 100px; width: 600px; text-align: center; height: 300px; line-height: 160%; font-size: 16px;; text-transform: uppercase; ">
        <div id="cert-city" style="padding-top: 30px; color: #000000; text-align: center;">
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
        <div id="cert-school" style="color: #000000; text-align: center; width: 500px; padding-left: 40px; height: 100px">
            <?= $model->school->name ?>
        </div>
        <div style="padding-top: 10px">
            <?= $model->grade ?> сынып оқушысы
        </div>
        <div style="padding-top: 10px; font-size: 20px; color: #652174; font-weight: bold">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
        <div style="padding-top: 10px; font-size: 18px">
            <?= $model->topic ?>
        </div>
    </div>
    <div style="padding-top: 120px; padding-left: 75px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div style="padding-top: 5px; text-transform: uppercase">
            <div id="cert-number" style="padding-top: 2px">Тіркеу №<?= $model->id ?></div>
        </div>
    </div>
</div>
