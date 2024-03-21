<?php
use Da\QrCode\QrCode;

/* @var $marathon \common\models\Marathon */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['marathon/get-cert-thank', 'id' => $marathon->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/kanikulda-kitap-oku-2024/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px; font-size: 12px">
        <div style="padding-top: 380px; padding-left: 170px; text-align: center; width: 460px; text-align: center; height: 320px">
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
            <div style="font-size: 18px; height: 100px">
                <?= $marathon->school->name ?>
            </div>
            <div style="font-size: 18px; margin-top: 10px;">
                <?= $marathon->grade ?> сынып оқушысы
            </div>
            <div id="cert-name" style="margin-top: 20px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: red">
                <?= $marathon->surname ?> <?= $marathon->name ?> <?= $marathon->patronymic ?>
            </div>
        </div>
        <div id="footer" style="padding-top: 270px; padding-left: 20px; font-size: 12px; font-family: 'Times New Roman'">
            <div id="cert-qrcode" style="width: 160px; font-size: 22px; font-weight: bold; padding-top: 5px">
                <img src="<?= $qrCode->writeDataUri() ?>" alt="qr">
            </div>
            <div id="cert-number" style="margin-top: 15px; color: white">Тіркеу №<?= $marathon->id ?></div>
        </div>
    </div>
</div>
