<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(60)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/teacher-diplom.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 1200px">
        <div id="cert-qrcode" style="padding-top: 65px; padding-left: 65px; font-size: 22px; font-weight: bold; "><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="padding-left: 120px; padding-top: 0; text-align: center; width: 560px; text-transform: uppercase;">
            <img style="width: 120px" src="<?= $testAssignment->testOption->test->olympiad->getImage() ?>" alt="logo">
            <div style="padding-top: 130px; font-size: 20px;">
                КӘСІБИ ДЕҢГЕЙІ ЖОҒАРЫ ЖӘНЕ ШЫҒАРМАШЫЛ, ТАЛАНТТЫ ПЕДАГОГТАР АРАСЫНДА ҰЙЫМДАСТЫРЫЛҒАН <br>
                <b><?= Strip_tags($testAssignment->testOption->test->olympiad->name) ?></b> <br>
                АТТЫ РЕСПУБЛИКАЛЫҚ ОЛИМПИАДАСЫНЫҢ
            </div>
            <div style="padding-top: 10px; font-size: 22px;">
                <b><?= $place ?> ИЕГЕРІ</b>
            </div>
            <div style="padding-top: 10px; font-size: 22px;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 14px; padding-top: 10px;">
                <?= $testAssignment->testOption->test->name ?> пәні мұғалімі
            </div>
            <div style="font-size: 14px;">
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                    }
                } ?>
            </div>
            <div style="font-size: 14px; height: 60px;"><?= $testAssignment->school->name ?></div>
        </div>
        <div class="border" style="padding-top: 320px; padding-left: 85px;">
            <div id="cert-number" style="font-size: 12px; font-weight: bold">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 12px; font-weight: bold"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
