<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\BookAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2025/oku/cert-thank.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; width: 1200px; height: 800px">
        <div style="padding-left: -260px; padding-top: 240px">
            <div id="cert-name" style="padding-left: 0; height: 80px; font-size: 22px; text-transform: uppercase; text-align: center;">
                <b><?= $model->leader_name ?></b>
            </div>
            <div id="footer" style="text-align: left; padding-left: 240px; padding-top: 280px; font-size: 14px; font-family: 'Times New Roman'">
                <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>" alt="qr"></div>
                <div style="padding-left: 0">
                    <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $model->id ?></div>
                    <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $model->created_at) ?> жыл</div>
                </div>
            </div>
        </div>
    </div>
</div>
