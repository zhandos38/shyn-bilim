<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['article/cert', 'id' => $model->id], 'https')))
    ->setSize(80)
    ->setMargin(5);
?>
<div class="cert-page" style="background-image: url('/img/article/tarbie-sagati2.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
    <div id="cert-name" style="padding-top: 320px; padding-left: 80px; width: 620px; text-align: center">
        <div style="width: 420px; padding-left: 100px; padding-top: 40px; font-style: italic; font-size: 16px;">
            <div id="cert-city" style="padding-top: 0; color: #000000; height: 10px; text-align: center;">
                <?php
                if ($model->school !== null) {
                    if ($model->school->city_id === 1 || $model->school->city_id === 2 || $model->school->city_id === 3) {
                        echo $model->school->city->name;
                    } else {
                        echo $model->school->city->region->name . ', ' . $model->school->city->name;
                    }
                }
                ?>
            </div>
            <div id="cert-school" style="color: #000000; height: 70px; text-align: center; line-height: 110%;">
                <?= $model->school->name ?>
                <div style="text-transform: uppercase; font-weight: bold; padding-top: 10px;">
                    <?php if ($model->subject->is_not_subject): ?>
                        <?= $model->subject->name_kz ?>
                    <?php else: ?>
                        <?= $model->subject->name_kz ?> пәні мұғалімі
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div style="padding-top: 10px; height: 100px; font-size: 24px; font-weight: bold; color: #BE9259;">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
        <div id="cert-topic" style="padding-top: 12px; font-size: 20px; color: #000000; line-height: 110%; font-weight: 500; margin-top: 70px; height: 100px">
            <?= $model->topic ?>
        </div>
    </div>
    <div style="padding-top: 160px; padding-left: 36px; font-size: 12px; color: #000000">
        <div id="cert-qrcode" style="height: 60px; padding-top: 40px; width: 160px; font-size: 22px;">
            <img src="<?= $qrCode->writeDataUri() ?>">
        </div>
        <div id="cert-number" style="padding-top: 20px; font-size: 12px">Тіркеу №<?= $model->id ?></div>
    </div>
</div>
