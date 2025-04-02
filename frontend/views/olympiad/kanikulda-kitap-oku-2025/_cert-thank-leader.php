<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setMargin(0)
    ->setSize(80);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2025/olympiad/thank_cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 800px">
        <div style="padding-top: 240px; padding-left: 320px; text-align: center; width: 600px; height: 300px; font-size: 18px">
            <div>
                <div style="font-size: 22px; font-weight: lighter; text-transform: uppercase; color: red">
                    <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
                </div>
            </div>
        </div>
        <div style="padding-left: 40px; padding-top: 100px; font-size: 12px">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
