<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-qyran-2024/certificate_thank.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 10px; padding-top: 500px; text-align: center;">
            <div id="cert-name" style="font-size: 18px; text-transform: uppercase; font-weight: bold">
                <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
            </div>
            <div style="font-size: 22px; padding-top: 5px; text-transform: uppercase; color: red; text-align: center">
                <b><?= $place ?></b>
            </div>
            <div style="padding-left: 80px; padding-top: 40px; font-family: 'Arial'; height: 100px; width: 500px; font-size: 16px">
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
            <div id="cert-name" style="height: 80px; font-size: 18px; padding-top: 5px; text-transform: uppercase; font-weight: bold">
                <?= $testAssignment->teacher_name ?>
            </div>
        </div>
        <div style="display: flex; padding-left: 80px; padding-top: 150px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 12px; padding-left: 0">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
