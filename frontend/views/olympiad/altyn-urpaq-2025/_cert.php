<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)->setMargin(0);

$olympiadId = $testAssignment->olympiad_id;
$cityId = $testAssignment->school->city_id;
$regionId = $testAssignment->school->city->region_id;
$template = 'cert.jpg';
if ($olympiadId === 24 && $cityId === 3) {
    $template = "shymkent/cert.jpg";
} else if ($olympiadId === 24 && $regionId === 14) {
    $template = "turkestan/cert.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url(<?= "./img/altyn-urpaq-2025/$template" ?>); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 90px; padding-top: 180px; text-align: left; width: 600px; height: 320px; font-size: 16px; text-transform: uppercase; font-weight: 500">
            <div style="padding-top: 150px; height: 80px; width: 420px; font-size: 14px; text-transform: none">
                <div style="padding-top: 0">
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
                <div>
                    <?= $testAssignment->grade ?> сынып оқушысы
                </div>
                <div style="font-size: 18px; padding-top: 5px">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
            <div style="padding-top: 10px">
                <div>
                    Жетекші мұғалімі
                </div>
                <div style="font-size: 18px;">
                    <b><?= $testAssignment->teacher_name ?></b>
                </div>
            </div>
        </div>
        <div class="border" style="padding-left: 890px; padding-top: -30px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: white; font-size: 12px; margin-top: 5px">
                <div id="cert-number"><b>№<?= $testAssignment->id ?></b></div>
                <div id="cert-date"><b>Күні <?= date('d.m.Y', $testAssignment->created_at) ?></b></div>
            </div>
        </div>
    </div>
</div>
