<?php

/* @var $testAssignment \common\models\TestAssignment */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/ped-olymp-diploma.jpg'); background-size: cover; background-repeat: no-repeat; width: 800px; height: 980px; font-family: 'Times New Roman';">
        <div id="cert-place" style="padding-top: 266px; padding-left: 30px; width: 900px; text-align: center; font-size: 28px; font-weight: bold; color: #e53830;"><?= $place ?> иегері</div>
        <div id="cert-region" style="padding-top: 155px; padding-left: 0; width: 900px; text-align: center; font-size: 14px;">
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
        <?php if ($testAssignment->school !== null): ?>
        <div id="cert-school" style="padding-top: 5px; padding-left: 80px; width: 540px; height: 35px; text-align: center; font-size: 14px;"><?= $testAssignment->school->name ?></div>
        <?php elseif ($testAssignment->kinder_garden !== null): ?>
        <div id="cert-school" style="padding-top: 15px; padding-left: 80px; width: 540px; height: 35px; text-align: center; font-size: 14px;"><?= $testAssignment->kinder_garden ?></div>
        <?php endif; ?>
        <div id="cert-subject" style="padding-top: 5px; padding-left: 0; font-size: 14px; color: #000000; height: 20px; width: 900px; text-align: center;"><?= $testAssignment->testOption->test->name ?> <br>пәні мұғалімі</div>
        <div id="cert-name" style="padding-top: 5px; padding-left: 0; width: 900px; text-align: center; font-size: 18px; font-weight: bold; color: #e53830;"><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
        <div id="cert-number" style="padding-top: 340px; padding-left: 88px; font-size: 14px; color: #454545; font-family: 'Times New Roman'"><?= $testAssignment->id ?></div>
    </div>
</div>
