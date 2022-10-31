<?php
use Da\QrCode\QrCode;

/* @var $marathon \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-parent', 'id' => $marathon->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/marathon-2022/marathon-certificate-parent-2022.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div style="padding-top: 210px;">
            <div id="cert-name" style="height: 80px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: #000"><?= $marathon->parent_name ?></div>
        </div>
        <div id="footer" style="text-align: left; padding-left: 180px; padding-top: 280px; font-size: 12px; color: #000; font-family: 'Times New Roman'">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-top: 2px"> №<?= $marathon->id ?></div>
            <div id="cert-date" style="padding-top: 5px;"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>

