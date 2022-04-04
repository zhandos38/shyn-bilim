<?php
use Da\QrCode\QrCode;

/* @var $model \common\models\Article */
?>
<div class="cert-page" style="background-size: cover; background-repeat: no-repeat; width: 1400px; font-family: 'Times New Roman';">
    <div style="padding: 80px">
        <div id="cert-name" style="padding-top: 60px; padding-left: 320px; text-align: center; font-size: 28px; font-weight: bold;">
            <?= $model->surname . ' ' . $model->name . ' ' . $model->patronymic ?>
        </div>
        <div>
            <?= $model->content ?>
        </div>
    </div>
</div>
