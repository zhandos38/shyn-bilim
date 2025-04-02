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
if ($olympiadId === 26 && $testAssignment->point === 20 && $regionId === 14) {
    $template = "diploma_turkestan.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url(<?= "./img/kanikulda-kitap-oku-2025/olympiad/$template" ?>); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-left: 145px; padding-top: 400px; width: 600px; height: 350px; font-size: 16px; text-align: left">
            <div style="text-align: center; font-size: 24px; text-transform: uppercase; font-weight: bold; margin-top: 5px; color: red">
                <?= $place ?>
            </div>
            <div style="width: 500px; margin-top: 110px; height: 80px; text-transform: uppercase">
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
            <div style="padding-top: 10px">
                <?= \common\models\BookAssignment::getGradeLabel($testAssignment->grade_alt) ?>
            </div>
            <div style="font-size: 18px; height: 40px; text-transform: uppercase; margin-top: 5px">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="margin-top: 2px">
                Мұғалімі
            </div>
            <div style="font-size: 18px; text-transform: uppercase">
                <b><?= $testAssignment->teacher_name ?></b>
            </div>
        </div>
        <div style="display: flex; padding-left: 40px; padding-top: 200px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
