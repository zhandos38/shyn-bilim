<?php
use Da\QrCode\QrCode;

/* @var $marathon \common\models\Marathon */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['marathon/get-cert-thank', 'id' => $marathon->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/marathon-2022/marathon-certificate-2022.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-top: 165px; padding-left: 280px; text-align: center; width: 540px; text-align: center;">
            <div id="cert-name" style="height: 60px; font-size: 24px; font-weight: bold; text-transform: uppercase; color: red">
                <?= $marathon->surname ?> <?= $marathon->name ?> <?= $marathon->patronymic ?>
            </div>
            <div style="padding-top: 5px; font-size: 18px">
                    <?php
                    if ($marathon->school !== null) {
                        if ($marathon->school->city_id === 1 || $marathon->school->city_id === 2 || $marathon->school->city_id === 3) {
                            echo $marathon->school->city->name;
                        } else {
                            echo $marathon->school->city->region->name . ', ' . $marathon->school->city->name;
                        }
                    } ?>
            </div>
            <div style="font-size: 18px; font-weight: bold; height: 75px">
                <?= $marathon->school->name ?>
            </div>
            <div style="font-size: 18px;">
                <?= $marathon->grade ?> сынып оқушысы
            </div>
        </div>
        <div id="footer" style="padding-top: 270px; padding-left: 1000px; font-size: 16px; color: #fff; font-family: 'Times New Roman'">
            <div id="cert-number">Тіркеу №<?= $marathon->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
            <div id="cert-qrcode" style="width: 160px; font-size: 22px; font-weight: bold; padding-top: 5px"><img src="<?= $qrCode->writeDataUri() ?>"></div>
        </div>
    </div>
</div>
