<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);

$fileName = './img/thank-2.jpg';
if ($testAssignment->grade >= 5 && $testAssignment->grade <= 6) {
    $fileName = './img/thank-5.jpg';
} elseif ($testAssignment->grade > 6) {
    $fileName = './img/thank-7.jpg';
}
?>
<div>
    <div class="cert-page" style="background-image: url(<?= $fileName ?>); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 800px">
        <div style="padding-left: 210px; padding-top: 200px">
            <div>
                <div style="font-size: 14px; width: 440px; padding-top: 20px; padding-left: 220px; font-weight: bold">
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                    <?= $testAssignment->school->name ?>
                </div>
                <div style="height: 162px; <?= $testAssignment->grade >= 5 ? 'padding-bottom: 35px' : '' ?>">
                    <?php if ($testAssignment->grade >= 5): ?>
                        <div id="cert-name" style="padding-top: 40px; height: 80px; font-size: 22px; text-transform: uppercase; color: #000;">
                            <div>
                                <?= $testAssignment->leader_name ?>
                            </div>
                            <div style="padding-top: 35px">
                                <?= $testAssignment->leader_name_second ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div id="cert-name" style="padding-top: 45px; height: 80px; font-size: 22px; text-transform: uppercase; color: #000;">
                            <?= $testAssignment->leader_name ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div style="padding-top: 45px; font-size: 20px;">
                    <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
            <div id="footer" style="text-align: left; padding-left: 50px; width: 160px; font-size: 16px; color: #454545; font-family: 'Times New Roman'; <?= $testAssignment->grade >= 5 ? 'padding-top: -58px' : 'padding-top: -22px' ?> ">
                <div id="cert-qrcode" style="width: 160px; font-size: 22px; padding-left: -56px; font-weight: bold;"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div id="cert-number" style="padding-top: 0"> №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 5px;"><?= date('d.m.Y') ?> жыл</div>
            </div>
        </div>
    </div>
</div>
