<?php
use common\models\Subject;use Da\QrCode\QrCode;

/* @var $testAssignment \common\models\TestAssignment */
/* @var $place string */
/* @var $diplomaImage string */
/* @var $pedagogSubject string | null */

$qrCode = (new QrCode(\yii\helpers\Url::toRoute(['olympiad/get-cert', 'id' => $testAssignment->id], 'https')))
    ->setSize(60)
    ->setMargin(5);

$subjectType = "humanitary";
if ($testAssignment->subject->kind === Subject::KIND_NATURAL) {
    $subjectType = "natural";
}
?>
<div>
    <div class="cert-page" style="font-family: 'Arial'; background-image: url('./img/altyn-qyran-2022/certificate/<?= $subjectType ?>/диплом.jpg'); background-size: cover; background-repeat: no-repeat; font-size: 18px; font-family: 'Arial'; height: 1200px">
        <div style="font-size: 22px; padding-left: -70px; padding-top: 210px; text-transform: uppercase; color: #fff; width: 320px; text-align: center;">
            <b><?= $place ?></b>
        </div>
        <div style="height: 160px; padding-top: <?= $testAssignment->subject->kind === Subject::KIND_NATURAL ? '175px' : '165px' ?>; padding-left: 150px; width: 860px; text-align: center;">
            <div style="padding-top: 0; font-size: 22px; font-weight: 400;">
                <?= $testAssignment->subject->name_kz ?> пәнінен
            </div>
            <div style="padding-top: 26px; font-size: 28px; font-weight: 400;">
                <b><?= $testAssignment->surname . ' ' . $testAssignment->name . ' ' . $testAssignment->patronymic ?></b>
            </div>
            <div style="padding-top: 8px; font-size: 22px; font-weight: 400;">
                <?= $testAssignment->grade ?> сынып оқушысы<br>
            </div>
            <div style="font-size: 13px; padding-top: 0;">
                <div>
                    <?php
                    if ($testAssignment->school !== null) {
                        if ($testAssignment->school->city_id === 1 || $testAssignment->school->city_id === 2 || $testAssignment->school->city_id === 3) {
                            echo $testAssignment->school->city->name;
                        } else {
                            echo $testAssignment->school->city->region->name . ', ' . $testAssignment->school->city->name;
                        }
                    } ?>
                </div>
                <div>
                    <?= $testAssignment->school->name ?>
                </div>
            </div>
        </div>
        <div class="border" style="display: flex; padding-left: 40px; padding-top: 80px; color: #fff9f6">
            <div id="cert-qrcode"><?= '<img src="' . $qrCode->writeDataUri() . '">' ?></div>
            <div style="color: #0a0a0a; padding-top: 10px; font-size: 14px; padding-left: 0">
                <div id="cert-number" style="color: #0a0a0a">Тіркеу №<?= $testAssignment->id ?></div>
            </div>
        </div>
    </div>
</div>
