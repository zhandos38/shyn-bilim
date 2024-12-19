<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(70)->setMargin(0);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/alash-okulari-2024/shymkent/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 80px; padding-top: 265px; width: 500px; height: 320px; font-size: 16px; font-weight: 500">
            <div style="text-align: right; font-size: 28px; margin-top: 8px; color: #00A652; padding-right: -90px">
                <b><?= $place ?></b>
            </div>
            <div style="padding-top: 205px; height: 100px">
                <div>
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="padding-top: 5px;">
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
            <div style="padding-top: 5px">
                <div style="font-weight: bold">
                    <?= $testAssignment->grade ?> сынып оқушысы
                </div>
                <div style="font-size: 20px; padding-top: 5px; text-transform: uppercase">
                    <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
                </div>
            </div>
            <div style="padding-top: 10px">
                <div style="font-weight: bold">
                    Мұғалімі
                </div>
                <div style="font-size: 20px; text-transform: uppercase">
                    <?= $testAssignment->teacher_name ?>
                </div>
            </div>
            <div style="padding-top: 10px; text-align: center; padding-left: -100px; font-weight: bold">
                марапатталады
            </div>
        </div>
        <div class="border" style="padding-left: 40px; padding-top: 225px">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="font-size: 12px; margin-top: 5px">
                <div id="cert-number"><b>№<?= $testAssignment->id ?></b></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
                <div>Шымкент, 2024/25 оқу жылы</div>
            </div>
        </div>
    </div>
</div>
