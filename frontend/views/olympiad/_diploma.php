<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(100)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/diplom-altyn-qyran-2021.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 800px">
        <div style="text-align: center; padding-top: 320px; padding-left: -620px; font-size: 42px; color: #fff9f6">
            <b><?= $place ?></b>
        </div>
        <div style="padding-left: 550px; padding-top: -120px; text-align: center; width: 500px; text-transform: uppercase;">
            <div style="height: 172px">
                <div style="font-size: 14px;"><?= $testAssignment->school->name ?></div>
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
                <div style="font-size: 14px; font-weight: bold"><?= $testAssignment->grade ?> сынып оқушысы</div>
                <div style="padding-top: 10px; font-size: 22px;">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
            <div style="padding-top: 20px; font-size: 16px; height: 100px"><?= $testAssignment->leader_name ?></div>
        </div>
        <div class="border" style="padding-left: 120px; padding-top: -50px; color: #fff9f6">
            <div id="cert-qrcode" style="padding-left: -55px; padding-top: 24px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="font-size: 14px; padding-top: 12px">№<?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 14px; padding-top: 1px; padding-left: -10px"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
