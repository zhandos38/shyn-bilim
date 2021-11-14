<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-parent', 'id' => $testAssignment->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/marathon/thanks_parent.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div id="cert-qrcode" style="padding-top: 60px; padding-left: 920px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="padding-top: 90px;">
            <div id="cert-name" style="height: 80px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: #000"><?= $testAssignment->parent_name ?>!</div>
        </div>
        <div id="footer" style="text-align: left; padding-left: 100px; padding-top: 378px; width: 160px; font-size: 16px; color: #fff; font-family: 'Times New Roman'">
            <div id="cert-number" style="padding-top: 5px"> №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-top: 7px;"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>

