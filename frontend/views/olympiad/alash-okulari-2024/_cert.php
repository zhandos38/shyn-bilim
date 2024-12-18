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
    <div class="cert-page" style="background-image: url('./img/alash-okulari-2024/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'ptSans'; height: 1200px">
        <div style="padding-left: 540px; padding-top: 240px; text-align: left; width: 600px; height: 320px; font-size: 18px">
            <div style="height: 100px; width: 420px">
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
            <div style="padding-top: 10px">
                <div>
                    <?= $testAssignment->grade ?> сынып оқушысы
                </div>
                <div style="font-size: 20px; text-transform: uppercase;">
                    <?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?>
                </div>
            </div>
            <div style="padding-top: 10px">
                <div style="font-weight: bold">
                    Мұғалімі
                </div>
                <div style="font-size: 20px; text-transform: uppercase;">
                    <?= $testAssignment->teacher_name ?>
                </div>
            </div>
            <div style="padding-top: 10px">
                БЕРІЛДІ
            </div>
        </div>
        <div class="border" style="padding-left: 430px; padding-top: 90px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; margin-top: 5px">
                <div id="cert-number" style="color: #0a0a0a">№<?= $testAssignment->id ?></div>
                <div id="cert-date" style="color: #0a0a0a;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
                <div style="color: #0a0a0a;">Қазақстан Республикасы 2024</div>
            </div>
        </div>
    </div>
</div>
