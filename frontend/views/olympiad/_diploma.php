<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(100)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/marathon/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 800px">
        <div id="cert-qrcode" style="padding-top: 24px; padding-left: 984px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="text-align: center; padding-top: 56px; padding-left: 236px; font-size: 32px; color: red">
            <b><?= $place ?></b>
        </div>
        <div style="padding-left: 450px; padding-top: 140px; text-align: left; width: 540px; text-transform: uppercase;">
            <div style="padding-top: 10px; font-size: 22px;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 14px;"><?= $testAssignment->grade ?> сынып оқушысы</div>
            <div style="font-size: 14px;">
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                    }
                } ?>
            </div>
            <div style="font-size: 14px; height: 100px;"><?= $testAssignment->school->name ?></div>
            <div style="padding-top: 30px; font-size: 20px;"><?= $testAssignment->leader_name?></div>
        </div>
        <div class="border" style="padding-left: 410px; padding-top: 109px">
            <div id="cert-number" style="font-size: 14px;">№<?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 14px; padding-top: 3px"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
