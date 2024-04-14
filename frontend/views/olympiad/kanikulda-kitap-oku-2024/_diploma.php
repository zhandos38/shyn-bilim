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
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2024/olympiad/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-left: 80px; padding-top: 265px; width: 800px; height: 450px; font-size: 14px">
            <div style="font-size: 36px; padding-left: 360px; text-transform: uppercase; color: red; text-align: center">
                <b><?= $place ?></b>
            </div>
            <div style="padding-top: 130px; width: 400px;">
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
            <div style="font-size: 14px; font-weight: bold; padding-top: 10px">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 14px; font-weight: bold; padding-top: 10px">
                Мұғалімі:
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase">
                <b><?= $testAssignment->teacher_name ?></b>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 40px; padding-top: 270px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
