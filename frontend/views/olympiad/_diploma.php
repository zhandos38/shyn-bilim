<?php

/* @var $testAssignment \common\models\TestAssignment */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/diploma-altyn-qyran.jpg'); background-size: cover; background-repeat: no-repeat; font-family: 'Times New Roman';">
        <div id="cert-region" style="padding-top: 180px; padding-left: 770px; width: 200px; text-align: center; font-size: 14px;">
            <?php
            if ($testAssignment->school !== null) {
                if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                    echo $testAssignment->school->city->name;
                } else {
                    echo $testAssignment->school->city->region->name;
                }
            }
            ?>
        </div>
        <div id="cert-school" style="padding-top: 5px; padding-left: 680px; width: 360px; height: 35px; text-align: center; font-size: 14px;"><?= $testAssignment->school->name ?></div>
        <div id="cert-school" style="padding-top: 38px; padding-left: 605px; width: 360px; height: 35px; text-align: center; font-size: 14px;"><?= $testAssignment->grade ?></div>
        <div id="cert-place" style="padding-top: -60px; padding-left: 30px; width: 560px; text-align: center; font-weight: bold; font-size: 38px; font-family: 'Arial'; color: #fff;"><?= $place ?></div>
        <div id="cert-name" style="padding-top: 5px; padding-left: 600px; width: 900px; text-align: center; font-size: 18px; font-weight: bold; color: #e53830;"><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
        <div id="cert-number" style="padding-top: 133px; padding-left: 100px; font-size: 14px; color: #fff; font-family: 'Times New Roman'; margin-bottom: 20px"><?= $testAssignment->id ?></div>
    </div>
</div>
