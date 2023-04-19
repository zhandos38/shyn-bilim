<?php
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert-thank-leader', 'id' => $testAssignment->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/jas-mathematic-2023/thank-cert-parent.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 800px">
        <div class="bordered" style="padding-left: -360px; padding-top: 290px">
            <div id="cert-name" style="height: 80px; font-size: 22px; text-transform: uppercase; text-align: center">
                <b><?= $testAssignment->parent_name ?></b>
                <br>
                <b><?= $testAssignment->parent_name_second ?></b>
            </div>
            <div id="cert-name" style="padding-top: 0; height: 80px; font-size: 22px; text-transform: uppercase; text-align: center">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
        </div>
        <div id="footer" style="text-align: right; padding-right: 150px; padding-top: 10px; font-size: 14px; font-family: 'Times New Roman'">
            <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>"></div>
            <div style="padding-top: 10px; padding-left: 80px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $testAssignment->id ?></div>
                <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $testAssignment->created_at) ?> жыл</div>
            </div>
        </div>
    </div>
</div>
