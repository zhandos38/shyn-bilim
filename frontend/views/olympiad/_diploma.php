<?php

/* @var $testAssignment \common\models\TestAssignment */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/ped-olymp-diploma.jpg'); background-size: cover; background-repeat: no-repeat; width: 800px; height: 1200px; font-family: 'Times New Roman';">
        <div id="cert-place" style="padding-top: 276px; padding-left: 20px; width: 900px; text-align: center; font-size: 28px; font-weight: bold; color: #e53830;"><?= $place ?> орын</div>
        <div id="cert-name" style="padding-top: 138px; padding-left: 0; width: 900px; text-align: center; font-size: 18px;"><?= $testAssignment->school->city->region->name ?></div>
        <div id="cert-name" style="padding-top: 10px; padding-left: 0; width: 900px; text-align: center; font-size: 18px;"><?= $testAssignment->school->name ?></div>
        <div id="cert-name" style="padding-top: 10px; padding-left: 0; width: 900px; text-align: center; font-size: 18px; font-weight: bold; color: #e53830;"><?= $testAssignment->name . ' ' . $testAssignment->surname . ' ' . $testAssignment->patronymic ?></div>
        <div id="cert-school" style="padding-top: 5px; padding-left: 400px; font-size: 16px; color: #000000; height: 20px; width: 900px; text-align: center; font-weight: 200"><?= $testAssignment->school->name ?></div>
        <div id="cert-number" style="padding-top: 425px; padding-left: 88px; font-size: 14px; color: #454545; font-family: 'Times New Roman'"><?= $testAssignment->id ?></div>
    </div>
</div>
