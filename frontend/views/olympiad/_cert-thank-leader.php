<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/marathon-2022/olympiad/cert-thank.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div style="padding-left: 20px; padding-top: 280px">
            <div id="cert-name" style="height: 80px; font-size: 22px; text-transform: uppercase; color: red; text-align: center">
                <?= $testAssignment->leader_name ?>
            </div>
            <div id="footer" style="text-align: left; padding-left: 70px; padding-top: 270px; width: 160px; font-size: 16px; color: #fff; font-family: 'Times New Roman'">
                <div id="cert-qrcode" style="width: 160px; font-size: 22px; padding-left: -52px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div id="cert-number" style="padding-top: 10px"> №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 0;"><?= date('d.m.Y', $testAssignment->created_at) ?> жыл</div>
            </div>
        </div>
    </div>
</div>
