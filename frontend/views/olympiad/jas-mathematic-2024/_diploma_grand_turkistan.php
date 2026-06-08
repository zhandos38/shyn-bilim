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
    <div class="cert-page" style="background-image: url('./img/jas-mathematic-2024/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-family: Arial; height: 1200px">
        <div style="padding-left: 147px; padding-top: 265px; width: 800px; height: 600px; font-size: 14px">
            <div style="padding-top: 340px; width: 400px;">
                <div style="font-size: 18px; text-transform: uppercase; font-weight: bold">
                    <?= $place ?> иегері
                </div>
                <div style="font-weight: 500; margin-top: 5px">
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
            <div style="font-size: 14px; padding-top: 10px">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-weight: bold; text-transform: uppercase; font-size: 18px">
                Марапатталады
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 38px; padding-top: 90px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
