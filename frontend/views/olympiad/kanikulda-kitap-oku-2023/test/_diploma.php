<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2023/test/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div style="padding-left: 440px; padding-top: 200px; width: 600px; height: 150px; font-size: 12px">
            <div style="font-size: 42px; text-transform: uppercase; color: red; text-align: center">
                <b><?= $place ?></b>
            </div>
            <div style="font-size: 22px; padding-top: 10px; font-weight: lighter; height: 40px; text-transform: uppercase; color: red">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="height: 80px; width: 400px;">
                <div style="font-weight: 500;">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div>
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
            <div style="font-size: 12px;">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 360px; padding-top: 215px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: -20px; font-size: 12px; padding-left: 100px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
