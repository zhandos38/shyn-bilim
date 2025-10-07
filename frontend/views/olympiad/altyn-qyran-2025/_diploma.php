<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(90)->setMargin(5);

$olympiadId = $testAssignment->olympiad_id;
$cityId = $testAssignment->school->city_id;
$regionId = $testAssignment->school->city->region_id;
$point = $testAssignment->point;
$template = 'diploma.jpg';
if ($olympiadId === 28 && $cityId === 3 && $point === 20) {
    $template = "diploma-shymkent.jpg";
} else if ($olympiadId === 28 && $regionId === 14 && $point === 20) {
    $template = "diploma-turkestan.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-qyran-2025/<?= $template ?>'); background-size: cover; background-repeat: no-repeat; font-family: 'PT Sans'; height: 1200px">
        <div style="font-size: 32px; padding-left: 20px; padding-top: 330px; text-transform: uppercase; color: red; text-align: center">
            <b><?= $place ?></b>
        </div>
        <div style="padding-left: 100px; padding-top: 115px; text-align: center; width: 600px; height: 150px; font-size: 18px">
            <div>
                <span style="text-transform: capitalize"><?= $testAssignment->subject->name ?></span> пәнінен
                <br>
                жеңімпаз болғаны үшін
            </div>
            <div style="padding-top: 5px; font-weight: lighter; text-transform: uppercase; font-size: 20px">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="padding-top: 5px;">
                <?= $testAssignment->grade ?> сынып оқушысы
            </div>
            <div style="font-family: 'Arial'; height: 100px; width: 600px">
                <div style="height: 90px">
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
                <div style="padding-top: 10px;">
                    <div>
                        Жетекшісі
                    </div>
                    <div style="margin-top: 5px; font-size: 20px; font-weight: lighter; text-transform: uppercase;">
                        <b><?= $testAssignment->teacher_name ?></b>
                    </div>
                    <div style="text-transform: uppercase; margin-top: 10px">
                        Марапатталады
                    </div>
                </div>
            </div>
        </div>
        <div style="display: flex; padding-left: 30px; padding-top: 150px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 12px; padding-left: 0">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
