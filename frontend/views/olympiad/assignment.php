<?php

use common\models\School;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this \yii\web\View */
/* @var $model \common\models\TestAssignment */
/* @var $subject \common\models\Subject */

$this->title = Yii::t('app', 'Регистрация');
?>
<h1><?= $subject->name ?></h1>
<p>
    <?= Yii::t('app', 'Заполните форму для участия в данной олимпиаде') ?>
    <?php if (Yii::$app->language === 'ru'): ?>
        Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>" target="_blank">публичной оферты</a>
    <?php else: ?>
        Мәліметтерді жібере отырып, <a style="color: red" href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
    <?php endif; ?>
</p>
<div class="row">
    <div class="col-md-4">
        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'iin') ?>

        <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name')) ?>

        <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name')) ?>

        <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
            'id' => 'signup-form-school_id',
            'data' => ArrayHelper::map(School::find()->asArray()->all(), 'id', 'name'),
            'options' => [
                'placeholder' => Yii::t('app', 'Укажите школу'),
                'class' => 'signup-form__input site-input'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

        <?php if ($subject->type === \common\models\Subject::TYPE_STUDENT): ?>

            <?= $form->field($model, 'grade')->dropDownList([
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
                5 => '5',
                6 => '6',
                7 => '7',
                8 => '8',
                9 => '9',
                10 => '10',
                11 => '11'
            ],[
                'prompt' => Yii::t('app', 'Выберите класс')
            ]) ?>

        <?php endif; ?>

        <?= $form->field($model, 'lang')->dropDownList([
            'kz' => 'Қазақша',
            'ru' => 'Русский'
        ], [
            'prompt' => Yii::t('app', 'Выберите язык')
        ]) ?>

        <?= \yii\bootstrap4\Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
