<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(100)
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
    <div class="cert-page" style="background-image: url('./img/marathon/certificate.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 800px">
        <div id="cert-qrcode" style="padding-top: 10px; padding-left: 980px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="padding-left: 480px; padding-top: 10px; text-align: center; width: 540px; text-transform: uppercase;">
            <div style="padding-top: 130px; font-size: 16px;">
                <?= $text ?>
            </div>
            <div style="padding-top: 40px; font-size: 22px; color: red">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-size: 14px; font-weight: 600; padding-top: 20px">
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
            <div style="font-size: 14px; padding-top: 10px; font-weight: 600;"><?= $testAssignment->grade ?> сынып оқушысы</div>
        </div>
        <div style="padding-left: 470px; padding-top: 230px">
            <div id="cert-number" style="font-size: 14px;">№<?= $testAssignment->id ?></div>
            <div id="cert-date" style="font-size: 14px; padding-top: 3px"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
