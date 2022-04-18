<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/young_math_than.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div style="padding-left: 160px; padding-top: 200px">
            <div>
                <div style="font-size: 14px; width: 440px; padding-top: 10px; padding-left: 260px; font-weight: bold; height: 100px">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                    <br>
                    <?= $testAssignment->school->name ?>
                </div>
                <div style="padding-top: 0; height: 140px; font-size: 16px; font-weight: bold">
                    <?php if ($testAssignment->grade >= 5): ?>
                        <div>Математика пәні мұғалімі</div>
                    <?php else: ?>
                        <div>Бастауыш сынып мұғалімі</div>
                    <?php endif; ?>
                    <div id="cert-name" style="height: 80px; font-size: 20px; text-transform: uppercase; color: #000; font-weight: bold">
                        <?= $testAssignment->leader_name ?>
                    </div>
                </div>
                <div style="padding-top: 0; font-size: 20px;">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
            <div id="footer" style="text-align: left; padding-left: -100px; padding-top: 160px; width: 160px; font-size: 16px; font-family: 'Times New Roman';">
                <div id="cert-qrcode" style="width: 160px; font-size: 22px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div id="cert-number" style="padding-top: 0; font-weight: bold"> Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 5px; font-weight: bold"><?= date('d.m.Y') ?> жыл</div>
            </div>
        </div>
    </div>
</div>
