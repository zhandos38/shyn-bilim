<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/math-diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'">
        <div id="cert-place" style="padding-left: 460px; font-weight: bold; font-size: 26px; color: #fff; text-transform: uppercase; padding-top: 40px;"><?= $place ?></div>
        <div class="border" style="padding-top: 550px; padding-left: 45px; width: 820px; height: 600px;">
            <div style="width: 400px; padding-left: 300px">
                <div id="cert-name" style="font-size: 22px; text-transform: uppercase; text-align: center; color: red"><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
                <div id="cert-grade" style="font-size: 16px; padding-top: 5px; text-align: center; font-weight: bold"><?= $testAssignment->getGrade() ?></div>
                <div id="cert-region" style="font-size: 16px; padding-top: 5px; text-align: center; font-weight: bold">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div id="cert-school" style="font-size: 16px; height: 60px; text-align: center; font-weight: bold"><?= $testAssignment->school->name ?></div>
            </div>
            <div id="cert-qrcode" style="padding-top: 60px; padding-left: 60px; font-size: 22px; font-weight: bold; "><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-top: 100px; padding-left: 60px; font-size: 12px; font-weight: bold">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-left: 60px; font-size: 12px; font-weight: bold"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
