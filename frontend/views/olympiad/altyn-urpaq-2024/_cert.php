<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)->setMargin(0);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-urpaq-2024/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 100px; padding-top: 340px; text-align: center; width: 600px; height: 320px; font-size: 16px; text-transform: uppercase; font-weight: 500">
            <div>
                <b>“АЛТЫН ҰРПАҚ”</b>
                <br>
                РЕСПУБЛИКАЛЫҚ ЗИЯТКЕРЛІК ОЛИМПИАДАСЫНА
            </div>
            <div style="padding-top: 5px; padding-left: 190px; height: 100px; width: 520px; font-size: 14px">
                <div>
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
            <div>
                <div>
                    <?= $testAssignment->grade ?> сынып оқушысы
                </div>
                <div style="font-size: 20px;">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
            <div style="padding-top: 10px">
                <div>
                    Жетекшісі
                </div>
                <div style="font-size: 20px;">
                    <b><?= $testAssignment->teacher_name ?></b>
                </div>
            </div>
            <div style="padding-top: 10px">
                БЕЛСЕНДІ ҚАТЫСҚАНЫ ҮШІН БЕРІЛДІ.
            </div>
        </div>
        <div class="border" style="padding-left: 90px; padding-top: 260px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; margin-top: 5px">
                <div id="cert-number" style="color: #0a0a0a"><b>№<?= $testAssignment->id ?></b></div>
                <div id="cert-date" style="color: #0a0a0a;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
