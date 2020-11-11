<?php

/* @var $testAssignment \common\models\TestAssignment */
?>
<div>
    <div class="cert-page" style="background-image: url('/img/ped-olymp-cert.jpg'); background-size: cover; background-repeat: no-repeat; width: 1400px; height: 1200px; font-family: 'Times New Roman';">
        <div id="cert-name" style="padding-top: 350px; padding-left: 400px; width: 900px; text-align: center; font-size: 38px; font-weight: bold; color: #e53830;"><?= ' ' . $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></div>
        <?php if ($testAssignment->school !== null): ?>
        <div id="cert-city" style="padding-top: 5px; padding-left: 400px; font-size: 16px; color: #000000; height: 10px; width: 900px; text-align: center; font-weight: 200"><?= $testAssignment->school->city->name ?></div>
        <div id="cert-school" style="padding-top: 5px; padding-left: 400px; font-size: 16px; color: #000000; height: 50px; width: 900px; text-align: center; font-weight: 200"><?= $testAssignment->school->name ?></div>
        <?php elseif ($testAssignment->kinder_garden !== null): ?>
        <div id="cert-school" style="padding-top: 5px; padding-left: 400px; font-size: 16px; color: #000000; height: 50px; width: 900px; text-align: center; font-weight: 200"><?= $testAssignment->kinder_garden ?></div>
        <?php endif; ?>
<!--        <div id="cert-subject" style="padding-top: 5px; padding-left: 400px; font-size: 16px; color: #000000; height: 10px; width: 900px; text-align: center; font-weight: 200">--><?//= $testAssignment->test->subject->name_kz ?><!--</div>-->
        <div id="footer" style="padding-top: 417px; padding-left: 420px; font-size: 16px; color: #454545; font-family: 'Times New Roman'">
            <div id="cert-number"><?= $testAssignment->id ?></div>
            <div id="cert-date" style="padding-top: 6px"><?= date('d.m.Y') ?></div>
        </div>
    </div>
</div>
