<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/thanks.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-top: 220px; padding-left: 420px; text-align: center; width: 520px;">
            <div style="font-size: 14px; font-weight: bold; height: 60px"><?= $testAssignment->school->name ?></div>
            <div style="font-size: 14px; font-weight: bold; height: 60px"><?= $testAssignment->testOption->test ?></div>
            <div id="cert-name" style="height: 80px; font-size: 22px; font-weight: bold; text-transform: uppercase; color: #0096cb">
                <?= $testAssignment->leader_name ?>
            </div>
        </div>
        <div id="footer" style="padding-top: 205px; padding-left: 25px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-qrcode" style="padding-top: 5px; width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
            <div id="cert-number" style="padding-top: 5px">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-top: 5px;"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
