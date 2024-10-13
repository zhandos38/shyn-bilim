<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setMargin(5)
    ->setSize(80);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-qyran-2024/certificate.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 240px; padding-top: 305px; text-align: center; width: 600px; height: 150px; font-size: 20px">
            <div>
                <?= $testAssignment->subject->name ?> пәнінен
            </div>
            <div style="margin-top: 30px; font-weight: lighter; text-transform: uppercase;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="margin-top: 10px; font-size: 16px">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="padding-left: 250px; font-family: 'Arial'; height: 100px; width: 500px; font-size: 16px">
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
                <div style=" font-weight: 500;">
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 20px; padding-top: -20px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 12px; padding-left: 0">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
