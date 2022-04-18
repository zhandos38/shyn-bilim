<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);

$text = '';
if ($testAssignment->testOption->test->olympiad_id === 8) {
    $text = 'КӘСІБИ ДЕҢГЕЙІ ЖОҒАРЫ ЖӘНЕ ШЫҒАРМАШЫЛ ТАЛАНТТЫ ПЕДАГОГТАР АРАСЫНДА ҰЙЫМДАСТЫРЫЛҒАН <br> <b>“ПӘН ОЛИМПИАДАСЫНЫҢ ҮЗДІК ПЕДАГОГЫ - 2021”</b> <br> АТТЫ РЕСПУБЛИКАЛЫҚ ОЛИМПИАДАНЫҢ <br> БЕЛСЕНДІ ҚАТЫСУШЫСЫ';
} elseif ($testAssignment->testOption->test->olympiad_id === 7) {
    $text = 'ОҚУ-ТӘРБИЕ ЖҰМЫСЫН БАСҚАРУДЫҢ ҮЗДІК ҮЛГІСІН КӨРСЕТІП ЖҮРГЕН МЕКТЕП ДИРЕКТОРЫ ОРЫНБАСАРЛАРЫНЫҢ <br> АРАСЫНДА ҰЙЫМДАСТЫРЫЛҒАН <br> <b>"ҮЗДІК ОРЫНБАСАР - 2021"</b> АТТЫ РЕСПУБЛИКАЛЫҚ ОЛИМПИАДАСЫНЫҢ БЕЛСЕНДІ ҚАТЫСУШЫСЫ';
} elseif ($testAssignment->testOption->test->olympiad_id === 6) {
    $text = 'ТӘУЕЛСІЗ ҚАЗАҚСТАННЫҢ БІЛІМ САЛАСЫНА <br> ӨЛШЕУСІЗ ҮЛЕС ҚОСЫП, ЖАҢАШЫЛДЫҚТЫҢ <br> БАСТАМАШЫСЫ БОЛЫП ЖҮРГЕН ІСКЕР БАСШЫЛАР <br> АРАСЫНДА ҰЙЫМДАСТЫРЫЛҒАН <br> <b>"БІЛІКТІ БАСШЫ - 2021"</b> АТТЫ РЕСПУБЛИКАЛЫҚ ОЛИМПИАДАСЫНЫҢ <br> БЕЛСЕНДІ ҚАТЫСУШЫСЫ';
}
?>
<div>
    <div class="cert-page" style="background-image: url('./img/young_math_cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 800px">
        <div style="padding-left: 240px; padding-top: 210px; text-align: center; width: 600px; text-transform: uppercase; font-size: 18px">
            <div style="font-size: 22px; padding-top: 10px; font-weight: lighter; font-family: 'vCourn'">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="padding-top: 10px;">
                <div>
                    <?= $testAssignment->grade ?> сынып оқушысы <br>
                </div>
                <?php
                if ($testAssignment->school !== null) {
                    if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                        echo $testAssignment->school->city->name;
                    } else {
                        echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                    }
                } ?>
            </div>
            <div style="height: 100px">
                <?= $testAssignment->school->name ?>
            </div>
        </div>
        <div id="cert-qrcode" style="padding-top: 220px; padding-left: 920px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="padding-left: 260px; padding-top: 20px;  transform: rotate(90deg);">
            <div id="cert-number" style="font-size: 14px;">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 14px; padding-top: 8px"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
