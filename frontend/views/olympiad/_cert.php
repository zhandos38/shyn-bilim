<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/math-diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman';">
        <div id="cert-city" style="padding-top: 360px; padding-left: 360px; font-size: 16px; color: #000000; height: 10px; width: 900px; text-align: center; font-weight: 200">
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
        <div id="cert-school" style="padding-top: 5px; padding-left: 440px; font-size: 14px; color: #000000; height: 80px; width: 600px; text-align: center; font-weight: 200;"><?= $testAssignment->school->name ?></div>
        <div id="cert-grade" style="padding-top: 5px; padding-left: 360px;  font-size: 14px; color: #000000; width: 900px; text-align: center; font-weight: 200"><?= $testAssignment->grade ?> <span>сынып оқушысы</span></div>
        <div id="cert-name" style="padding-top: 5px; padding-left: 450px; height: 65px; width: 600px; text-align: center; font-size: 18px; font-weight: bold; text-transform: uppercase"><?= ' ' . $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
        <div style="padding-top: 5px; padding-left: 450px; height: 65px; width: 600px; text-align: center; font-size: 16px; font-weight: bold; text-transform: uppercase">
            <div id="cert-name"><?= ' ' . $testAssignment->leader_name ?></div>
            <div id="cert-name"><?= ' ' . $testAssignment->leader_name_second ?></div>
        </div>
        <div id="footer" style="padding-top: 0; padding-left: 464px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-qrcode" style="height: 60px; padding-top: 5px; padding-left: 560px; width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
            <div id="cert-number" style="padding-bottom: 38px; padding-top: -30px"><br><?= $testAssignment->id ?></div>
        </div>
    </div>
</div>
