<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(100)->setMargin(0);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/altyn-urpaq-2025/cert-thank-parent.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Arial'; height: 1200px">
        <div style="padding-left: 100px; padding-top: 265px; text-align: center; width: 1000px; height: 320px; font-size: 18px; text-transform: uppercase; font-weight: 500">
            <div style="padding-left: 160px; height: 160px; width: 600px;">
                <div>
                    <div>
                        <b><?= $testAssignment->parent_name_second ?></b>
                    </div>
                    <div style="padding-top: 5px">
                        <b><?= $testAssignment->parent_name ?></b>
                    </div>
                </div>
                <div style="padding-top: 42px">
                   <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
                </div>
            </div>
        </div>
        <div class="border" style="padding-left: 780px; padding-top: 0; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: white; font-size: 12px; margin-top: 60px; padding-left: -10px;">
                <div id="cert-number"><b>№<?= $testAssignment->id ?></b></div>
                <div id="cert-date">Күні <?= date('d.m.Y', $testAssignment->created_at) ?></div>
            </div>
        </div>
    </div>
</div>
