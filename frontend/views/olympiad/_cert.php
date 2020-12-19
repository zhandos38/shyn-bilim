<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('/img/cert-altyn-qyran.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman';">
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
        <div id="cert-school" style="padding-top: 5px; padding-left: 440px; font-size: 16px; color: #000000; height: 50px; width: 600px; text-align: center; font-weight: 200"><?= $testAssignment->school->name ?></div>
        <div id="cert-grade" style="padding-top: 5px; padding-left: 360px; color: #000000; width: 900px; text-align: center; font-weight: 200"><?= $testAssignment->grade ?> <span>сынып оқушысы</span></div>
        <div id="cert-name" style="padding-top: 5px; padding-left: 450px; height: 65px; width: 600px; text-align: center; font-size: 18px; font-weight: bold; text-transform: uppercase"><?= ' ' . $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
        <div id="cert-name" style="padding-top: 20px; padding-left: 370px; width: 900px; text-align: center;">Жетекші мұғалімі</div>
        <div id="cert-name" style="padding-top: 5px; padding-left: 450px; height: 65px; width: 600px; text-align: center; font-size: 18px; font-weight: bold; text-transform: uppercase"><?= ' ' . $testAssignment->leader_name ?></div>
        <div id="footer" style="padding-top: 0; padding-left: 464px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-qrcode" style="height: 60px; padding-top: 40px; padding-left: 540px; width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
            <div id="cert-number" style="padding-top: -60px; height: 80px"><?= $testAssignment->id ?></div>
        </div>
    </div>
</div>
