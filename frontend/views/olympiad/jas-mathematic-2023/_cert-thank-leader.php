<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);

$teacherType = "Мұғалім";
?>
<div>
    <div class="cert-page" style="background-image: url('./img/jas-mathematic-2023/thank-cert-teacher.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 160px; padding-top: 280px; text-align: center; width: 600px">
            <div class="bordered" style="font-size: 12px; font-weight: 500; padding-top: 10px">
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                    }
                } ?>
            </div>
            <div class="bordered" style="font-size: 12px; font-weight: 500;">
                <?= $testAssignment->school->name ?>
            </div>
            <div class="bordered" id="cert-name" style="padding-top: 10px; height: 60px; font-size: 18px; text-transform: uppercase;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div class="bordered" id="cert-name" style="height: 80px; font-size: 18px; padding-top: 40px; text-transform: uppercase">
                <b><?= $testAssignment->teacher_name ?></b>
            </div>
        </div>
        <div id="footer" style="text-align: left; padding-left: 80px; padding-top: 20px; width: 160px; font-size: 14px; font-weight: bold; font-family: 'Times New Roman'">
            <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>"></div>
            <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?> жыл</div>
        </div>
    </div>
</div>
