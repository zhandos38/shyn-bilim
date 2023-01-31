<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);

$teacherType = "Мұғалім";
$imgFile = "thank.jpg";
if ($testAssignment->grade >= 1 && $testAssignment->grade <= 4) {
    $imgFile = "thank_1-4.jpg";
    $teacherType = "Бастауыш сынып мұғалімі";
} else if ($testAssignment->grade >= 5 && $testAssignment->grade <= 11) {
    $imgFile = "thank_5-11.jpg";
}
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-urpaq-2023/<?= $imgFile ?>'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 65px; padding-top: 400px">
            <div class="bordered" id="cert-name" style="padding-top: 95px; height: 60px; font-size: 18px; text-transform: uppercase;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div class="bordered" style="font-size: 14px; font-weight: 500; padding-top: 10px">
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                    }
                } ?>
            </div>
            <div class="bordered" style="font-size: 14px; font-weight: 500; width: 460px">
                <?= $testAssignment->school->name ?>
            </div>
            <div class="bordered" id="cert-name" style="font-size: 18px; padding-top: 20px; height: 20px;">
                <?= $teacherType ?>
            </div>
            <div class="bordered" id="cert-name" style="height: 80px; font-size: 18px; padding-top: 10px; text-transform: uppercase">
                <b><?= $testAssignment->teacher_name ?></b>
            </div>
            <div id="footer" style="text-align: left; padding-left: 0; padding-top: 100px; width: 160px; font-size: 14px; font-family: 'Times New Roman'">
                <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?> жыл</div>
            </div>
        </div>
    </div>
</div>
