<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/altyn-urpak-diplom.jpg'); background-size: cover; background-repeat: no-repeat;font-size: 18px; font-family: 'Arial';">
        <div id="cert-place" style="padding-left: 740px; width: 560px; text-align: center; font-weight: bold; font-size: 46px; color: #fff; text-transform: uppercase; padding-top: 70px"><?= $place ?></div>
        <div class="border" style="padding-top: 212px; padding-left: 45px; width: 620px; height: 600px;">
            <div id="cert-grade" style="font-size: 18px"><?= $testAssignment->getGrade() ?></div>
            <div id="cert-name" style="font-size: 22px; text-transform: uppercase; font-weight: bold"><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
            <div id="cert-region" style="font-size: 13px;  padding-top: 5px;">
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name;
                    }
                }
                ?>
            </div>
            <div id="cert-school" style="font-size: 13px; height: 60px;"><?= $testAssignment->school->name ?></div>
            <div id="cert-name" style="padding-top: 40px; font-size: 22px; font-weight: bold; text-transform: uppercase;"><?= $testAssignment->leader_name ?></div>
            <div id="cert-name" style="padding-top: 8px; font-size: 22px; font-weight: bold; text-transform: uppercase"><?= $testAssignment->leader_name ?></div>
            <div id="cert-qrcode" style="padding-top: 60px; padding-left: 5px; font-size: 22px; font-weight: bold; "><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-left: 120px; padding-top: -15px; font-size: 14px; color: #fff; font-weight: bold">№<?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-left: 180px; padding-top: -20px; font-size: 14px; color: #fff; font-weight: bold"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
