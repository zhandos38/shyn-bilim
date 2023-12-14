<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-qyran-2023/thank-leader-cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 55px; padding-top: 400px; text-align: center;">
            <div id="cert-name" style="padding-top: 65px; height: 60px; font-size: 18px; text-transform: uppercase;">
                <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
            </div>
            <div id="cert-name" style="font-size: 18px; padding-top: 20px; height: 20px; text-transform: uppercase">
                <?= $testAssignment->teacher_type_name ?>
            </div>
            <div id="cert-name" style="height: 80px; font-size: 18px; padding-top: 10px; text-transform: uppercase">
                <?= $testAssignment->teacher_name ?>
            </div>
        </div>
        <div style="display: flex; padding-left: 50px; padding-top: 170px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 12px; padding-left: 0">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
