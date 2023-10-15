<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/signup']];
$this->params['heroTitle'] = $this->title;
$this->params['heroDescription'] = 'Заполните форму чтобы зарегистрироватся:';
?>
<div class="bg-gradient-13">
    <div class="container pt--60">
        <div class="section-title text-center mb--60">
            <span class="subtitle bg-secondary-opacity">Регистрация</span>
            <h2 class="title">Тіркелу</h2>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'surname') ?>

                <?= $form->field($model, 'patronymic') ?>

                <?= $form->field($model, 'iin') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'address') ?>

                <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7(999)999-99-99',
                    'clientOptions' => [
                        'removeMaskOnSubmit' => true
                    ],
                ]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'post') ?>

                <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'), ['placeholder' => Yii::t('app', 'Укажите регион')]) ?>

                <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'), ['placeholder' => Yii::t('app', 'Укажите регион')]) ?>

                <?= $form->field($model, 'school_id')->dropDownList(ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', 'name'), ['placeholder' => Yii::t('app', 'Укажите регион')]) ?>

                <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Продолжить'), ['class' => 'rbt-btn btn-gradient w-100', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$js =<<<JS
$('#signupform-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#signupform-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#signupform-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#signupform-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;


$this->registerJs($js);
?>
