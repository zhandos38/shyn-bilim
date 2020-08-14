<?php

use common\models\School;
use common\models\Subject;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="order-form">
    <h1><?= $this->title ?></h1>
    <p><?= Yii::t('app', 'Чтобы опубликовать материал, необходимо заполнить форму. Стоимость 1000 тенге') ?>.
        <?php if (Yii::$app->language === 'ru'): ?>
            Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>" target="_blank">публичной оферты</a>
        <?php else: ?>
            Мәліметтерді жібере отырып, <a style="color: red" href="<?= Yii::$app->params['staticDomain'] . '/offer.pdf' ?>" target="_blank">қоғамдық ұсыныспен</a> келісесіз
        <?php endif; ?>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'topic') ?>

    <?= $form->field($model, 'subject_id')->dropDownList(\yii\helpers\ArrayHelper::map(Subject::find()->where(['type' => Subject::TYPE_ARTICLE])->asArray()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Выбрать предмет')]) ?>

    <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Укажите регион')]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Укажите город')]) ?>

    <?= $form->field($model, 'school_id')->dropDownList(ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name'), ['prompt' => Yii::t('app', 'Укажите школу')]) ?>

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
<?php
$js =<<<JS
$('#article-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#article-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#article-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#article-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;


$this->registerJs($js);
?>