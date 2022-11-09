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
    <div class="cert-page" style="background-image: url('./img/marathon-2022/olympiad/diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 1200px">
        <div style="font-size: 32px; padding-left: 10px; padding-top: 50px; text-transform: uppercase; color: #fff; width: 320px; text-align: center; font-family: 'Times New Roman'">
            <b><?= $place ?></b>
        </div>
        <div style="height: 160px; padding-top: 280px; padding-left: 45px; width: 860px;">
            <div style="padding-top: 8px; font-size: 28px; color: red; font-weight: 400; font-family: 'Times New Roman';">
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
                <div>
                    <?= $testAssignment->school->name ?>
                    <div>
                        <?= $testAssignment->grade ?> сынып оқушысы<br>
                    </div>
                </div>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 60px; padding-top: 100px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 14px; padding-left: 65px">
                <div id="cert-number" style="color: #0a0a0a"><?= $testAssignment->id ?></div>
                <div id="cert-date" style="color: #0a0a0a; padding-left: -20px"><?= date('d.m.Y') ?></div>
            </div>
        </div>
    </div>
</div>
