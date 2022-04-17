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
    <div class="cert-page" style="background-image: url('./img/young_math_diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 1200px">
        <div style="text-align: center; padding-left: 180px; padding-top: 180px; width: 480px; text-transform: uppercase;">
            <div style="font-size: 30px">
                <b><?= $place ?> ИЕГЕРІ</b>
            </div>
            <div style="height: 172px; padding-top: 110px">
                <div style="font-size: 13px; padding-top: 0; font-weight: bold">
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
                    <div class="border" style="height: 110px">
                        <?= $testAssignment->school->name ?>
                        <div>
                            <?= $testAssignment->grade ?> сынып оқушысы <br>
                        </div>
                    </div>
                </div>
                <div style="padding-top: 8px; font-size: 24px; color: red">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 915px; padding-top: -230px; color: #fff9f6">
            <div style="color: #0a0a0a; font-weight: bold; padding-bottom: 20px">
                <div id="cert-number" style="font-size: 12px; color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="font-size: 12px; color: #0a0a0a"><?= date('d.m.Y') ?></div>
            </div>
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        </div>
    </div>
</div>
