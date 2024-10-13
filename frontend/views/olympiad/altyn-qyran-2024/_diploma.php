<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(90)->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-qyran-2024/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="font-size: 28px; padding-left: 20px; padding-top: 360px; text-transform: uppercase; color: red; text-align: center">
            <b><?= $place ?></b>
        </div>
        <div style="padding-left: 100px; padding-top: 130px; text-align: center; width: 600px; height: 150px; font-size: 20px">
            <div style="padding-top: 50px; font-weight: lighter; text-transform: uppercase;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 16px; padding-top: 10px;">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="padding-left: 50px; font-family: 'Arial'; height: 100px; width: 500px; font-size: 16px">
                <div style="height: 94px">
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
                <div style="padding-top: 20px; font-weight: lighter; text-transform: uppercase;">
                    <b><?= $testAssignment->teacher_name ?></b>
                </div>
            </div>
        </div>
        <div style="display: flex; padding-left: 20px; padding-top: 200px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 12px; padding-left: 0">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
