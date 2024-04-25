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
    <div class="cert-page" style="background-image: url('./img/en-bilimdi-pedagog-2024/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-left: 20px; padding-top: 340px; width: 800px; height: 350px; font-size: 14px; text-align: center">
            <div style="font-size: 22px; text-transform: uppercase; margin-top: 5px">
                <b><?= $place ?></b>
            </div>
            <div style="color: #bd8e34; font-size: 22px; height: 36px; text-transform: uppercase; margin-top: 30px">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="padding-top: 20px">
                <span><?= $testAssignment->subject->name_kz ?></span> <?= !$testAssignment->subject->is_not_subject ? 'пәні' : '' ?> мұғалімі
            </div>
            <div style="width: 400px; padding-left: 180px">
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
        </div>
        <div class="border" style="display: flex; padding-left: 40px; padding-top: 280px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
