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
    <div class="cert-page" style="background-image: url('./img/en-bilimdi-pedagog-2024/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-top: 240px; padding-left: 150px; text-align: center; width: 800px; height: 300px; font-size: 18px">
            <div>
                <div style="font-size: 24px; padding-top: 5px; font-weight: lighter; color: red">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
                <div style="padding-top: 5px">
                    <span style="text-transform: capitalize"><?= $testAssignment->subject->name_kz ?></span> <?= !$testAssignment->subject->is_not_subject ? 'пәні' : '' ?> мұғалімі
                </div>
                <div style="font-size: 16px">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 16px">
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
        </div>
        <div style="padding-left: 40px; padding-top: 90px; font-size: 12px">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
