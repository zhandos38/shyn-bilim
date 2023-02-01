<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(65)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-urpaq-2023/thank_parent.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div class="bordered" style="padding-left: 20px; padding-top: 260px">
            <div id="cert-name" style="height: 80px; font-size: 22px; text-transform: uppercase; text-align: center">
                <b><?= $testAssignment->parent_name ?></b>
            </div>
            <div id="footer" style="text-align: left; padding-left: 50px; padding-top: 290px; font-size: 14px; font-family: 'Times New Roman'">
                <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>"></div>
                <div style="padding-top: -40px; padding-left: 80px">
                    <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                    <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?> жыл</div>
                </div>
            </div>
        </div>
    </div>
</div>
