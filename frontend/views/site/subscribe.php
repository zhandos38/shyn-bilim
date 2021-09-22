<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Подписатся';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['site/login']];
?>
<div class="subscribe-login mt-5 mb-5">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните форму чтобы подписатся</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'subscribe-form']); ?>

                <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
                ]) ?>

                <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
                ]) ?>

                <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', function ($model) {
                        return htmlspecialchars_decode($model['name']);
                    }),
                    'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
                ]) ?>
                <small class="text-secondary"><?= Yii::t('app', 'Если вы не нашли вашу школу, напишите нам bilimshini.kz@mail.ru') ?></small>

                <?= $form->field($model, 'address') ?>

                <?= $form->field($model, 'post')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Подписатся', ['class' => 'btn btn-primary', 'name' => 'subscribe-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$js =<<<JS
$('#subscribeform-region_id').change(function() {
  $.get({
    url: '/kz/site/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#subscribeform-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#subscribeform-city_id').change(function() {
  $.get({
    url: '/kz/site/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#subscribeform-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;


$this->registerJs($js);
?>