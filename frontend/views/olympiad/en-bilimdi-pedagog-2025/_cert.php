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
    <div class="cert-page" style="background-image: url('./img/en-bilimdi-pedagog-2025/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-top: 530px; padding-left: 100px; text-align: center; width: 600px; height: 300px; font-size: 18px">
            <div>
                <div style="font-size: 22px; font-weight: lighter; text-transform: uppercase">
                    <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
                </div>
                <div style="height: 80px; padding-top: 10px">
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
                <div style="padding-top: 5px">
                    <span style="text-transform: capitalize"><?= $testAssignment->subject->name_kz ?></span> <?= !$testAssignment->subject->is_not_subject ? 'пәні' : '' ?> <?= $testAssignment->subject->suffix_label_kz ?>
                </div>
            </div>
        </div>
        <div style="padding-left: 100px; padding-top: 120px; font-size: 12px">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
