<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)->setMargin(5);

$olympiadId = $testAssignment->olympiad_id;
$cityId = $testAssignment->school->city_id;
$regionId = $testAssignment->school->city->region_id;
$template = 'diploma.jpg';
if ($olympiadId === 25 && $testAssignment->point === 20 && $cityId === 3) {
    $template = "diploma-shymkent.jpg";
} else if ($olympiadId === 25 && $testAssignment->point === 20 && $regionId === 14) {
    $template = "diploma-turkestan.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url(<?= "./img/en-bilimdi-pedagog-2025/$template" ?>); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-left: 200px; padding-top: 430px; width: 600px; height: 350px; font-size: 18px; text-align: center">
            <div style="font-size: 24px; text-transform: uppercase; font-weight: bold; margin-top: 5px; color: #c8973c">
                <?= $place ?>
            </div>
            <div style="width: 500px; margin-left: 50px; margin-top: 130px; height: 80px">
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
            <div style="margin-top: 10px">
                <span><?= $testAssignment->subject->suffix_label_kz ?></span>
            </div>
            <div style="font-size: 22px; height: 40px; text-transform: uppercase; margin-top: 5px">
                <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
            </div>
        </div>
        <div style="display: flex; padding-left: 40px; padding-top: 140px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
