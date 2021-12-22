<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/thanks-altyn-qyran-2021.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div style="padding-left: 360px; padding-top: 200px">
            <div style="padding-top: 15px; padding-right: 60px; width: 600px;">
                <div id="cert-name" style="height: 80px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: #000">
                    <?= $testAssignment->leader_name ?>
                </div>
            </div>
            <div id="footer" style="text-align: left; padding-left: 20px; padding-top: 340px; width: 160px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
                <div id="cert-qrcode" style="width: 160px; font-size: 22px; padding-left: -52px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div id="cert-number" style="padding-top: 5px"> №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 0;"><?= date('d.m.Y') ?> жыл</div>
            </div>
        </div>
    </div>
</div>
