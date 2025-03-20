<?php

use common\models\Subject;
use Da\QrCode\QrCode;

/* @var $model \common\models\BookAssignment */
/* @var $certImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $model->id], 'https')))
    ->setSize(80)->setMargin(5);
?>
<div>
    <div class="cert-page" style="background-image: url('./img/kanikulda-kitap-oku-2025/oku/cert.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman'; height: 1200px">
        <div style="padding-left: 80px; padding-top: 450px; width: 800px; height: 450px; font-size: 14px">
            <div class="bordered" style="width: 400px; height: 100px">
                <div style="font-weight: 500;">
                    <?php
                    if ($model->school !== null) {
                        if ($model->school->city_id === 1 || $model->school->city_id === 2 || $model->school->city_id === 3) {
                            echo $model->school->city->name;
                        } else {
                            echo $model->school->city->region->name . ', ' . $model->school->city->name;
                        }
                    } ?>
                </div>
                <div>
                    <?= $model->school->name ?>
                </div>
            </div>
            <div style="font-size: 14px; font-weight: bold; padding-top: 10px">
                <?= $model->getGrade() ?> сынып оқушысы
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase">
                <b><?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?></b>
            </div>
            <div style="font-size: 14px; font-weight: bold; padding-top: 10px">
                Мұғалімі:
            </div>
            <div style="font-size: 22px; height: 36px; text-transform: uppercase">
                <b><?= $model->leader_name ?></b>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 40px; padding-top: 100px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; font-size: 12px; font-weight: bold">
                <div id="cert-number">Тіркеу №<?= $model->id ?></div>
            </div>
        </div>
    </div>
</div>
