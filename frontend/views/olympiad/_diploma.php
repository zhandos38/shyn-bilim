<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $place string */
/* @var $diplomaImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url(<?= './img/' . $diplomaImage ?>); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 1200px">
        <div id="cert-qrcode" style="padding-top: 140px; padding-left: 40px"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="padding-left: 110px; padding-top: 320px; width: 480px; text-transform: uppercase;">
            <div style="font-size: 30px">
                <b><?= $place ?> ИЕГЕРІ</b>
            </div>
            <div style="height: 172px; padding-top: 5px">
                <div style="padding-top: 8px; font-size: 22px;">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
                <div style="font-size: 11px; padding-top: 20px">
                    <?php if ($pedagogSubject): ?>
                        <?= $pedagogSubject ?> <br>
                    <?php endif; ?>
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 11px; width: 440px;"><?= $testAssignment->school->name ?></div>
            </div>
        </div>
        <div class="border" style="padding-left: 120px; padding-top: 280px; color: #fff9f6">
            <div id="cert-number" style="font-size: 14px; padding-top: 15px; color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 14px; color: #0a0a0a"><?= date('d.m.Y') ?></div>
        </div>
    </div>
</div>
