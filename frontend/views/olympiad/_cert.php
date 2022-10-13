<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(50);

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
    <div class="cert-page" style="background-image: url('./img/en-bilimdi-pedagog-2022/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 800px">
        <div style="padding-left: 490px; padding-top: 240px; text-align: center; width: 500px; height: 150px; text-transform: uppercase; font-size: 18px">
            <div style="font-size: 22px; padding-top: 2px; font-weight: lighter; font-family: 'Times New Roman'; color: red;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="font-family: 'Times New Roman'">
                <div style="padding-top: 10px; font-size: 9px">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div style="font-size: 9px">
                    <?= $testAssignment->school->name ?>
                </div>
                <div style="font-size: 9px">
                    <?= $testAssignment->testOption->test->name ?> мұғалімі <br>
                </div>
            </div>
        </div>
        <div id="cert-qrcode" style="padding-top: 295px; padding-left: 400px;"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
        <div style="padding-left: 470px; padding-top: -35px; font-size: 10px">
            <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
            <div id="cert-date"><?= date('d.m.Y') ?> жыл</div>
        </div>
    </div>
</div>
