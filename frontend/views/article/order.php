<?php

use common\models\Subject;
use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="order-form">
    <h1><?= $this->title ?></h1>
    <p>Чтобы опубликовать материал, необходимо заполнить форму и произвести оплату на сумму 2500 тенге.

        <?php if (Yii::$app->language === 'ru'): ?>
            Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>" target="_blank">публичной оферты</a>
        <?php else: ?>
            Мәліметтерді жібере отырып, <a style="color: red" href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
        <?php endif; ?>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'subject_id')->dropDownList(\yii\helpers\ArrayHelper::map(Subject::find()->asArray()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Выбрать предмет')]) ?>

    <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'document/*'
        ],
        'pluginOptions' => [
            'theme' => 'fa',
            'showCaption' => false,
        ],
    ]) ?>

    <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Оплатить и опубликовать'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end() ?>

</div>
