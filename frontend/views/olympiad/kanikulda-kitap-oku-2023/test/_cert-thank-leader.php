<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2023/test/thank_cert2.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-top: 360px; padding-left: 90px;">
            <div id="cert-name" style="height: 80px; font-size: 22px; text-transform: uppercase; padding-top: 20px; color: red">
                <b><?= $testAssignment->teacher_name ?></b>
            </div>
            <div id="footer" style="text-align: left; padding-left: 0; padding-top: 520px; width: 200px; font-size: 12px; font-family: 'Times New Roman'">
                <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div style="padding-left: 80px; padding-top: -20px">
                    <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
