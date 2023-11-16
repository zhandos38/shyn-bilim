<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(70)->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/en-bilimdi-pedagog-2023/diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 127px; padding-top: 300px; width: 540px; height: 150px; font-size: 18px; text-align: center">
            <div style="color: #6840AD">
                <b><?= $place ?></b>
            </div>
            <div style="font-size: 18px; padding-top: 10px; font-weight: lighter; height: 30px; text-transform: uppercase;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
                <div style="padding-left: 10px; padding-top: 10px; width: 600px; font-family: 'Arial'; height: 100px;">
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
                <div>
                    <?= $testAssignment->subject->name_kz ?> <?= !$testAssignment->subject->is_not_subject ? 'пәні' : '' ?> мұғалімі
                </div>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 160px; padding-top: 370px">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="padding-top: 5px; font-size: 11px; padding-left: 0;">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y') ?></div>
            </div>
        </div>
    </div>
</div>
