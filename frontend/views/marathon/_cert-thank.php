<?php
use Da\QrCode\QrCode;

/* @var $marathon \common\models\Mararthon */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['marathon/get-cert-thanl', 'id' => $marathon->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/marathon-2022/marathon-certificate-2022.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-top: 220px; padding-left: 300px; text-align: center; width: 520px; text-align: center;">
            <div id="cert-name" style="height: 80px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: red">
                <?= $marathon->name ?> <?= $marathon->surname ?> <?= $marathon->patronymic ?>
            </div>
            <div style="padding-top: 10px; font-size: "14px">
                   <?= var_dump($marathon->school) ?>
                    <?php
                    if ($marathon->school !== null) {
                        if ($marathon->school->city_id === 1 || $marathon->school->city_id === 2 || $marathon->school->city_id === 3) {
                            echo $marathon->school->city->name;
                        } else {
                            echo $marathon->school->city->region->name . ', ' . $marathon->school->city->name;
                        }
                    } ?>
                </div>
            <div style="font-size: 14px; font-weight: bold; height: 60px"><?= $marathon->school->name ?></div>
        </div>
        <div id="footer" style="padding-top: 505px; padding-left: 500px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-number">Тіркеу №<?= $marathon->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
            <div id="cert-qrcode" style="width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
        </div>
    </div>
</div>
