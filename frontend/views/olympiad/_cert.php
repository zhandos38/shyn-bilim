<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(70)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/math-cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-top: 540px; padding-left: 335px;">
            <div id="cert-name" style="height: 65px; width: 600px; font-size: 24px; font-weight: bold; text-transform: uppercase; color: #34359f"><?= ' ' . $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
            <div id="cert-grade" style="padding-top: 5px; font-size: 16px; width: 900px; font-weight: 200; color: #34359f"><?= $testAssignment->grade ?> <span>сынып оқушысы</span></div>
            <div id="cert-city" style="padding-top: 5px; font-size: 16px; height: 10px; width: 900px; font-weight: 200; color: #34359f">
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name ;
                    }
                }
                ?>
            </div>
            <div id="cert-school" style="padding-top: 5px; font-size: 14px; color: #34359f; height: 80px; width: 420px; font-weight: 200;"><?= $testAssignment->school->name ?></div>
        </div>
        <div id="footer" style="padding-top: 180px; padding-left: 115px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-qrcode" style="padding-top: 5px; width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
            <div id="cert-number" style="padding-top: 13px"><?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-top: 2px; padding-left: -85px"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
