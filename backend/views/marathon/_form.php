<?php

use insolita\wgadminlte\LteBox;
use insolita\wgadminlte\LteConst;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Marathon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marathon-form">

    <?php

    LteBox::begin([
        'type' => LteConst::TYPE_INFO,
        'isSolid' => true,
        'boxTools' => Html::a('Назад <i class="fas fa-arrow-alt-circle-left"></i>', ['index'], ['class' => 'btn btn-danger btn-xs create_button']),
        'tooltip' => 'this tooltip description',
        'title' =>  $this->title
    ])

    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_name')->textInput() ?>

    <?= $form->field($model, 'iin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Укажите регион')],
    ]); ?>

    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\City::find()->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Укажите город')],
    ]); ?>

    <?= $form->field($model, 'school_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\common\models\School::find()->asArray()->all(), 'id', function ($model) {
            return htmlspecialchars_decode($model['name']);
        }),
        'options' => ['placeholder' => Yii::t('app', 'Укажите школу')],
    ]); ?>

    <?= $form->field($model, 'grade')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_teacher')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php LteBox::end() ?>

</div>
<?php
$js =<<<JS
$('#marathon-region_id').change(function() {
  $.get({
    url: '/test-assignment/get-cities',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#marathon-city_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});

$('#marathon-city_id').change(function() {
  $.get({
    url: '/test-assignment/get-schools',
    data: {id: $(this).val()},
    dataType: 'JSON',
    success: function(result) {
      let options = '<option value>-</option>';
      result.forEach(function(item) {
        options += '<option value="' + item.id + '">' + item.name + '</option>'; 
      });
      
      $('#marathon-school_id').html(options);
    },
    error: function() {
      console.log('Ошибка');
    }
  });
});
JS;


$this->registerJs($js);
?>