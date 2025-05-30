<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80);

$imgFile = "cert.jpg";
if ($testAssignment->grade >= 1 && $testAssignment->grade <= 4) {
    $imgFile = "cert_1-4.jpg";
} else if ($testAssignment->grade >= 5 && $testAssignment->grade <= 11) {
    $imgFile = "cert_5-11.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-urpaq-2023/<?= $imgFile ?>'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 800px">
        <div style="padding-left: 40px; padding-top: 220px; text-align: center; width: 600px; height: 150px; font-size: 18px">
            <div style="font-size: 22px; padding-top: 40px; font-weight: lighter; height: 40px; text-transform: uppercase">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="padding-top: 5px; padding-left: 90px; font-family: 'Arial'; height: 80px; width: 420px">
                <div style="font-size: 14px; font-weight: 500">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 14px; font-weight: 500">
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
            <div style="text-transform: uppercase; font-size: 14px;">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 20px; padding-top: 280px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: -45px; font-size: 12px; padding-left: 100px">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="color: #0a0a0a;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
