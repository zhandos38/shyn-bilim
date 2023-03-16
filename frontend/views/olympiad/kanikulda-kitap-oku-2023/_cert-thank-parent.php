<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2023/parent_thank_cert.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div class="bordered" style="padding-left: 0; padding-top: 280px">
            <div id="cert-name" style="padding-left: -340px; height: 80px; font-size: 22px; text-transform: uppercase; text-align: center">
                <?= $testAssignment->parent_name ?>
                <br>
                <?= $testAssignment->parent_name_second ?>
            </div>
            <div id="footer" style="text-align: left; padding-left: 40px; padding-top: 280px; width: 160px; font-size: 14px; font-family: 'Times New Roman'">
                <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?> жыл</div>
            </div>
        </div>
    </div>
</div>
