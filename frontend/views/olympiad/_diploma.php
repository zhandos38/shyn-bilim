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
    <div class="cert-page" style="background-image: url('./img/en-bilimdi-pedagog-2022/diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 1200px">
        <div style="font-size: 36px; padding-left: 100px; padding-top: 220px; text-transform: uppercase; color: #fff; width: 320px; text-align: center; font-family: 'Times New Roman'">
            <b><?= $place ?></b>
        </div>
        <div style="height: 160px; padding-top: 80px; padding-left: 120px; width: 540px; text-align: center">
            <div style="padding-top: 8px; font-size: 24px; color: rgb(22,106,143); font-family: 'Times New Roman';">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 13px; padding-top: 0; font-family: 'Times New Roman'">
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
                <div class="border">
                    <?= $testAssignment->school->name ?>
                    <div>
                        <?= $testAssignment->testOption->test->name ?> мұғалімі <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 20px; padding-top: 457px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 10px">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="color: #0a0a0a"><?= date('d.m.Y') ?></div>
            </div>
        </div>
    </div>
</div>
