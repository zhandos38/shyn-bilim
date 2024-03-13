<?php

use common\models\ArticleMagazine;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\form\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

/* @var $this \yii\web\View */
/* @var $model \common\models\Article */
/* @var $articleMagazine \common\models\ArticleMagazine */

$this->title = Yii::t('app', 'Опубликовать материал');
?>
<div class="bg-gradient-13 pt--60 pb--60">
    <div class="container">
        <h1><?= $this->title ?></h1>
        <p>
            <?php if (Yii::$app->language === 'ru'): ?>
                Отправляя данные вы соглашаетесь с условиями <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">публичной оферты</a>
            <?php else: ?>
                Мәліметтерді жібере отырып, <a style="color: red" href="<?= '/file/offer.pdf' ?>" target="_blank">келісімді</a> мақұлдайсыз
            <?php endif; ?>
        </p>

        <?php $form = ActiveForm::begin() ?>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'article_magazine_id')->dropDownList(ArrayHelper::map(ArticleMagazine::find()->all(), 'id', 'name')) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'surname') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'patronymic') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'iin') ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                    'options' => [
                        'autofocus' => true
                    ]
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Subject::find()->andWhere(['type' => \common\models\Subject::TYPE_ARTICLE])->asArray()->all(), 'id', Yii::$app->language === 'ru' ? 'name_ru' : 'name_kz'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите предмет')],
                ]) ?>
            </div>
            <div class="col-md-9">
                <?= $form->field($model, 'topic') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                ]) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                ]) ?>
            </div>
        </div>

        <?php if ($articleMagazine->type === ArticleMagazine::TYPE_STUDENT): ?>
        <div class="row">
            <div class="col-md-3">
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
                    11 => '11',
                ], [
                    'prompt' => Yii::t('app', 'Выберите класс')
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'lead_name') ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'fileTemp')->widget(FileInput::classname(), [
                    'options' => [
                        'accept' => 'document/*'
                    ],
                    'pluginOptions' => [
                        'theme' => 'fa',
                        'showCaption' => false,
                        'showUpload' => false,
                        'browseLabel' =>  Yii::t('app', 'Загрузить')
                    ],
                ]) ?>
            </div>
        </div>

        <?= Html::submitButton(Yii::t('app', 'Сохранить/Оплатить'), ['class' => 'rbt-btn']) ?>

        <?php ActiveForm::end() ?>

    </div>
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
