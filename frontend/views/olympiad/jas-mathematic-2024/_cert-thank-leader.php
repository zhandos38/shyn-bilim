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
    <div class="cert-page" style="background-image: url('./img/jas-mathematic-2024/charter.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-left: 50px; padding-top: 265px; width: 800px; height: 580px; font-size: 14px; text-align: center">
            <div style="padding-top: 300px; width: 500px; padding-left: 120px">
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
            <div style="font-size: 14px; padding-top: 5px">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase; margin-top: 5px">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 20px">
                белсенді қатысып, жеңімпаз болғаны үшін
            </div>
            <div style="font-size: 14px; font-weight: bold; padding-top: 10px; text-transform: uppercase">
                Мұғалімі
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase; margin-top: 5px">
                <b><?= $testAssignment->teacher_name ?></b>
            </div>
            <div style="font-size: 14px; font-weight: bold; text-transform: uppercase">
                Марапатталады
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 38px; padding-top: 110px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>