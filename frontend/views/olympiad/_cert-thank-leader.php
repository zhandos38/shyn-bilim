<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/marathon/thanks_leader.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div id="cert-qrcode" style="padding-top: 120px; padding-left: -10px; width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
        <div style="padding-top: 30px;">
            <div id="cert-name" style="height: 80px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: #000"><span style="padding-left: -5px"><?= $testAssignment->leader_name ?>!</div>
        </div>
        <div id="footer" style="text-align: left; padding-left: 100px; padding-top: 391px; width: 160px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-number" style="padding-top: 5px"> №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-top: 7px;"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>