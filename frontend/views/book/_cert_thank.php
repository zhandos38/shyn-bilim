<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\BookAssignment */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2025/oku/cert-thank.jpg'); text-align: center; background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 20px; padding-top: 260px">
            <div id="cert-name" style="padding-left: 120px; height: 80px; font-size: 22px; text-transform: uppercase; text-align: center;">
                <b><?= $model->leader_name ?></b>
            </div>
            <div id="footer" style="text-align: left; padding-left: 40px; padding-top: 480px; width: 160px; font-size: 14px; font-family: 'Times New Roman'">
                <div id="cert-qrcode"><img src="<?= $qrCode->writeDataUri() ?>" alt="qr"></div>
                <div style="padding-left: 0">
                    <div id="cert-number" style="padding-top: 10px">Тіркеу №<?= $model->id ?></div>
                    <div id="cert-date" style="padding-top: 0;">Күні <?= date('d.m.Y', $model->created_at) ?> жыл</div>
                </div>
            </div>
        </div>
    </div>
</div>
