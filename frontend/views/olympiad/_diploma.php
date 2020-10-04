<?php

/* @var $testAssignment \common\models\TestAssignment */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/ped-olymp-diploma.jpg'); background-size: cover; background-repeat: no-repeat; width: 800px; height: 800px; font-family: 'Times New Roman';">
        <div id="cert-place" style="padding-top: 276px; padding-left: 20px; width: 900px; text-align: center; font-size: 28px; font-weight: bold; color: #e53830;"><?= $place ?> иегері</div>
        <div id="cert-region" style="padding-top: 130px; padding-left: 0; width: 900px; text-align: center; font-size: 14px;"><?= $testAssignment->school->city->region->name ?></div>
        <div id="cert-school" style="padding-top: 5px; padding-left: 80px; width: 540px; height: 40px; text-align: center; font-size: 14px;"><?= $testAssignment->school->name ?></div>
        <div id="cert-subject" style="padding-top: 5px; padding-left: 0; font-size: 14px; color: #000000; height: 20px; width: 900px; text-align: center;"><?= $testAssignment->test->subject->name_kz ?> мұғалімі</div>
        <div id="cert-name" style="padding-top: 20px; padding-left: 0; width: 900px; text-align: center; font-size: 18px; font-weight: bold; color: #e53830;"><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
        <div id="cert-number" style="padding-top: 336px; padding-left: 88px; font-size: 14px; color: #454545; font-family: 'Times New Roman'"><?= $testAssignment->id ?></div>
    </div>
</div>
