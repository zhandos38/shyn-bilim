<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(50);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-qyran-2022/certificate/humanitary/сертификат.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-top: 498px; text-align: center; width: 800px; height: 150px; font-size: 18px">
            <div style="font-size: 18px; font-weight: lighter;">
                <?= $testAssignment->subject->name ?> пәнінен
            </div>
            <div style="font-size: 22px; padding-top: 60px; font-weight: lighter;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-family: 'Arial'">
                <div>
                    <?= $testAssignment->grade ?> сынып оқушысы
                </div>
                <div style="padding-top: 10px; font-size: 12px">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 12px">
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
        </div>
        <div style="padding-left: 40px; padding-top: 300px; font-size: 10px">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div id="cert-number" style="padding-top: 20px">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
