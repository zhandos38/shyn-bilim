<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(90)->setMargin(5);

$imgFile = "diploma.jpg";
if ($testAssignment->grade >= 1 && $testAssignment->grade <= 4) {
    $imgFile = "diploma_1-4.jpg";
} else if ($testAssignment->grade >= 5 && $testAssignment->grade <= 11) {
    $imgFile = "diploma_5-11.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-urpaq-2023/<?= $imgFile ?>'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 800px">
        <div style="font-size: 22px; padding-left: 500px; padding-top: 60px; text-transform: uppercase; color: #fff; text-align: center">
            <b><?= $place ?></b>
        </div>
        <div style="padding-left: 210px; padding-top: 90px; text-align: center; width: 600px; height: 150px; font-size: 18px">
            <div style="padding-left: 100px; padding-top: 10px; font-family: 'Arial'; height: 100px; width: 400px;">
                <div style="font-size: 14px; font-weight: 500;">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 14px; font-weight: 500;">
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
            <div style="text-transform: uppercase; font-size: 14px;">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="font-size: 22px; padding-top: 10px; font-weight: lighter; height: 60px; text-transform: uppercase">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 40px; padding-top: 210px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #fff; padding-top: 5px; font-size: 11px; padding-left: 0; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y') ?></div>
            </div>
        </div>
    </div>
</div>
