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
if ($olympiadId === 27 && $testAssignment->point === 20 && $cityId !== 3 && $regionId === 14) {
    $template = "diploma_turkestan.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url(<?= "./img/jas-mathematic-2025/$template" ?>); background-size: cover; background-repeat: no-repeat; font-family: Arial; height: 1200px">
        <div style="padding-left: 270px; padding-top: 160px; width: 800px; height: 600px; font-size: 14px">
            <div style="padding-top: 150px; width: 400px;">
                <div style="font-size: 22px; text-transform: uppercase; font-weight: bold; color: red">
                    <?= $place ?>
                </div>
                <div style="font-weight: 500; margin-top: 160px">
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
                <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
            </div>
            <div style="font-size: 14px; padding-top: 10px; text-transform: uppercase">
                Мұғалімі
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase; margin-top: 5px">
                <?= $testAssignment->teacher_name ?>
            </div>
            <div style="text-transform: uppercase; font-size: 18px">
                Марапатталады
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 250px; padding-top: 210px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
