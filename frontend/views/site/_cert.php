<?php

/* @var $user \common\models\User */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/diploma-red.jpg'); background-size: cover;  width: 1585px; height: 1200px; position: absolute; top: 0; left: 0;">
        <div style="padding-top: 305px; padding-left: 100px; width: 680px; font-size: 18px; font-family: 'Times New Roman'; color: #494018;">
            <div style="width: 100%; padding-left: 180px">
                Шымкентский Университет SHU
            </div>
            <div style="margin-top: 50px; margin-left: 360px;">
                <div><?= $user['protocol_year'] ?></div>
                <div style="padding-left: 160px; padding-top: -24px"><?= $user['protocol_day'] ?></div>
            </div>
            <div style="margin-left: 160px"><?= $user['protocol_month'] ?></div>
            <div style="margin-left: 420px; margin-top: -24px"><?= $user['protocol_number'] ?></div>
            <div style="text-align: center; padding-right: 60px">
                <div><?= $user['full_name_kz'] ?></div>
                <div style="padding-top: 37px"><?= $user['spec_kz'] ?></div>
            </div>
            <div style="margin-top: 212px; margin-left: 260px"><?= $user['edu_form_kz'] ?></div>
<!--            <div>--><?//= $user['protocol_number'] ?><!--</div>-->
        </div>
    </div>
</div>
