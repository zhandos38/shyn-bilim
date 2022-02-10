<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(100)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/diploma.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 800px">
        <div style="padding-left: 570px; padding-top: 245px; text-align: center; width: 480px; text-transform: uppercase;">
            <div style="font-size: 30px">
                <b><?= $place ?></b>
            </div>
            <div style="height: 172px; padding-top: 5px">
                <div style="font-size: 11px;">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 11px; width: 440px; padding-left: 20px"><?= $testAssignment->school->name ?></div>
                <div style="font-size: 11px;"><?= $testAssignment->grade ?> сынып оқушысы</div>
                <div style="padding-top: 8px; font-size: 22px; color: #4ba55e">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
        </div>
        <div class="border" style="padding-left: 150px; padding-top: 125px; color: #fff9f6">
            <div id="cert-qrcode" style="padding-top: 24px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="font-size: 14px; padding-top: 15px; color: #0a0a0a"><?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 14px; padding-left: 120px; padding-top: -18px"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
